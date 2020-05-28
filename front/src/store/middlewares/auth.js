import axios from 'axios';

import { LOGIN, homePageConnected, SET_USER, SET_USER_TOKEN } from 'src/store/actions';

export default (store) => (next) => (action) => {
    console.log('MW Auth');
    switch (action.type) {
        case LOGIN: {
            axios
                .post('http://localhost:3001/login', {
                    email: store.getState().email,
                    password: store.getState().password,
                })
                .then((response) => {
                    if (response.status === 200) {
                        localStorage.user = JSON.stringify(response.data);
                        localStorage.userToken = JSON.stringify(response.data.token);
                        const user = JSON.parse(localStorage.getItem('user'));
                        const userToken = JSON.parse(localStorage.getItem('userToken'));
                        store.dispatch({ type: SET_USER, user });
                        store.dispatch({ type: SET_USER_TOKEN, payload: userToken });
                        store.dispatch(homePageConnected(action.history));
                    }
                })
                .catch((error) => {
                    console.trace(error);
                });
            return;
        }

        default: {
            next(action);
        }
    }
};
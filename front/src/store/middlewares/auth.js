import axios from 'axios';

import { LOGIN, homePageConnected, SET_USER, setUserToken, connected, resetLoginInput } from 'src/store/actions';
import { API_URL, LOGIN_URL } from '../../utils/constant';

const loginRequest = `${API_URL}${LOGIN_URL}`;

export default (store) => (next) => (action) => {
    console.log('MW Auth');
    switch (action.type) {
        case LOGIN: {
            axios({
                method: 'post',
                url: loginRequest,
                // withCredentials: true,
                data: {
                    username: store.getState().email,
                    password: store.getState().password,
                },
                // headers: {
                //     "Content-Type": "application/json",
                //     'Access-Control-Allow-Origin': '*',
                // }
            })
                .then((response) => {
                    if (response.status === 200) {
                        console.log(response.data)
                        localStorage.userToken = JSON.stringify(response.data.token);
                        const userToken = JSON.parse(localStorage.getItem('userToken'));
                        store.dispatch(setUserToken(userToken));
                        store.dispatch(resetLoginInput());
                        store.dispatch(connected());
                        store.dispatch(homePageConnected(action.history));
                        // localStorage.user = JSON.stringify(response.data);
                        // const user = JSON.parse(localStorage.getItem('user'));
                        // store.dispatch({ type: SET_USER, user });
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
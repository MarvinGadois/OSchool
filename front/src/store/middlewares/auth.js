import axios from 'axios';

// Import action
import { LOGIN, homePageConnected, setUser, setUserToken, connected, resetLoginInput } from 'src/store/actions';

// Import constant
import { API_URL, LOGIN_URL } from '../../utils/constant';

// Import setAuthorisationToken
import setAuthorizationToken from '../../utils/setAuthorizationToken';

// Import jwt-decode
import jwtDecode from 'jwt-decode';

const notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'center',
        y: 'top',
    }
});

const loginRequest = `${API_URL}${LOGIN_URL}`;

export default (store) => (next) => (action) => {
    console.log('MW Auth');
    const cleanEmail = store.getState().email.trim();
    const cleanPassword = store.getState().password;
    switch (action.type) {
        case LOGIN: {

            if (cleanEmail === '' || cleanPassword === '') {
                notyf.error(`Authentification échoué ! Veuillez remplir tous les champs`);
                return false
            }

            axios({
                method: 'post',
                url: loginRequest,
                data: {
                    username: store.getState().email.trim(),
                    password: store.getState().password,
                },
            })
                .then((response) => {
                    if (response.status === 200) {
                        localStorage.setItem('jwtToken', response.data.token);
                        setAuthorizationToken(response.data.token);
                        store.dispatch(setUser(jwtDecode(response.data.token)));
                        store.dispatch(resetLoginInput());
                        store.dispatch(connected());
                        store.dispatch(homePageConnected(action.history));
                        notyf.success('Authentification réussie');
                    }
                })
                .catch((error) => {
                    notyf.error('Authentification échoué !');
                    store.dispatch(resetLoginInput());
                    console.trace(error);
                });
            return;
        }
        default: {
            next(action);
        }
    }
};
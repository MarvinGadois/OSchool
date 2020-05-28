import {
    SYNC_EMAIL,
    SYNC_PASSWORD,
    SET_USER,
    SET_USER_TOKEN,
} from './actions';


const initialState = {
    user: '',
    userToken: '',
    email: '',
    password: '',
    connected: false,
};


export default (state = initialState, action = {}) => {
    switch (action.type) {
        case SYNC_EMAIL: {
            return {
                ...state,
                email: action.email,
            };
        }
        case SYNC_PASSWORD: {
            return {
                ...state,
                password: action.password,
            };
        }
        case SET_USER: {
            return {
                ...state,
                user: action.user,
            };
        }
        case SET_USER_TOKEN: {
            return {
                ...state,
                userToken: action.payload,
            };
        }
        default: {
            return state;
        }
    }
};
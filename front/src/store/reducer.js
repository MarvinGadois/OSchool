// Import action
import {
    SYNC_EMAIL,
    SYNC_PASSWORD,
    SET_USER,
    SET_OPINIONS,
    CONNECTED,
    DISCONNECTED,
    RESET_LOGIN_INPUT,

    SET_NEWS,

} from './actions';

// State initial
const initialState = {
    user: {},
    email: '',
    password: '',
    connected: false,
    opinions: [],
    news: [],
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
        case SET_OPINIONS: {
            return {
                ...state,
                opinions: action.opinions,
            };
        }
        case CONNECTED: {
            return {
                ...state,
                connected: true,
            };
        }
        case DISCONNECTED: {
            localStorage.removeItem('jwtToken');
            return {
                ...state,
                connected: false,
                user: {},
                news: [],
            };
        }
        case RESET_LOGIN_INPUT: {
            return {
                ...state,
                email: '',
                password: '',
            };
        }

        case SET_NEWS: {
            return {
                ...state,
                news: action.news,
            };
        }
        default: {
            return state;
        }
    }
};
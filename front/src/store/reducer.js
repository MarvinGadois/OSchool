// Import action
import {
    SYNC_EMAIL,
    SYNC_PASSWORD,
    SET_USER,
    SET_OPINIONS,
    CONNECTED,
    DISCONNECTED,
    RESET_LOGIN_INPUT,
    SET_SCHOOL_NEWS,
    SET_NEWS_SIMPLE,
    SET_CLASSROOM,
    SET_GRADES_BY_USER,
} from './actions';

// State initial
const initialState = {
    user: {},
    email: '',
    password: '',
    connected: false,
    opinions: [],
    newsNoConnected: [],
    schoolNews: [],
    classrooms: [],
    gradesUser: [],
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
                classrooms: [],
                gradesUser: [],
            };
        }
        case RESET_LOGIN_INPUT: {
            return {
                ...state,
                email: '',
                password: '',
            };
        }

        case SET_SCHOOL_NEWS: {
            return {
                ...state,
                schoolNews: action.news,
            };
        }
        case SET_NEWS_SIMPLE: {
            return {
                ...state,
                newsNoConnected: action.newsSimple,
            };
        }
        case SET_CLASSROOM: {
            return {
                ...state,
                classrooms: [...state.classrooms, action.Oneclass],
            };
        }
        case SET_GRADES_BY_USER: {
            return {
                ...state,
                gradesUser: action.grades,
            };
        }
        default: {
            return state;
        }
    }
};
import {
    SYNC_EMAIL,
    SYNC_PASSWORD,
    INCREMENT,
} from './actions';


const initialState = {
    email: '',
    password: '',
    counter: 0,
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
        case INCREMENT: {
            return {
                ...state,
                counter: state.counter + 1,
            };
        }
        default: {
            return state;
        }
    }
};
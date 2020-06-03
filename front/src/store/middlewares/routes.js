
import { HOMEPAGE_CONNECTED, DISCONNECTED } from '../actions';

export default (store) => (next) => (action) => {
    switch (action.type) {
        case HOMEPAGE_CONNECTED: {
            action.history.push('/');
            break;
        }
        case DISCONNECTED: {
            action.history.push('/');
            //break;
        }
        default: {
            next(action);
        }
    }
};


import { HOMEPAGE_CONNECTED, DISCONNECTED } from '../actions';


const notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'center',
        y: 'top',
    }
});

export default (store) => (next) => (action) => {
    switch (action.type) {
        case HOMEPAGE_CONNECTED: {
            action.history.push('/');
            break;
        }
        case DISCONNECTED: {
            action.history.push('/');
            notyf.success('Au revoir ...');
        }
        default: {
            next(action);
        }
    }
};

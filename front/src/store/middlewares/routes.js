
import { HOMEPAGE_CONNECTED } from '../actions';

export default (store) => (next) => (action) => {
    switch (action.type) {
        case HOMEPAGE_CONNECTED: {
            action.history.push('/');
            break;
        }
        default: {
            // Si le middleware n'est pas intéressé par l'action reçue,
            // alors il laisse filer l'action vers la suite de son voyage.
            next(action);
        }
    }
};

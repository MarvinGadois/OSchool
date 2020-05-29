import { createStore, compose } from 'redux';
import reducer from './reducer';

// Import MiddleWare
import middlewares from './middlewares';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

// On utilise une fonction utilitaire fournie par l'extension Redux DevTools pour venir « pimper » notre store.	
const enhancers = composeEnhancers(middlewares);

const store = createStore(reducer, enhancers);

export default store;
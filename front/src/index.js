import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import { BrowserRouter as Router } from 'react-router-dom';

import setAuthorizationToken from './utils/setAuthorizationToken';
import jwtDecode from 'jwt-decode';
import { setUser } from './store/actions';

import App from 'src/components/App';
import store from 'src/store';

// Si token dans localStorage config automatiquement les headers des requetes axios avec le bon token pour requete avec token vers back
if (localStorage.jwtToken) {
    setAuthorizationToken(localStorage.jwtToken);
    store.dispatch(setUser(jwtDecode(localStorage.jwtToken)));
}

const rootReactElement = (
    <Router>
        <Provider store={store}>
            <App />
        </Provider>
    </Router>
);

const target = document.getElementById('root');

render(rootReactElement, target);

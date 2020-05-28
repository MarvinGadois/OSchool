// Action Login
export const SYNC_EMAIL = 'actions/SYNC_EMAIL';
export const SYNC_PASSWORD = 'actions/SYNC_PASSWORD';
export const LOGIN = 'actions/LOGIN';

export const syncEmail = (email) => ({ type: SYNC_EMAIL, email, });
export const syncPassword = (password) => ({ type: SYNC_PASSWORD, password, });
export const login = (history) => ({ type: LOGIN, history });

// action HomePage
export const HOMEPAGE_CONNECTED = 'actions/HOMEPAGE_CONNECTED';
export const SET_USER = 'actions/SET_USER';
export const SET_USER_TOKEN = 'actions/SET_USER_TOKEN';

export const homePageConnected = (history) => ({ type: HOMEPAGE_CONNECTED, history });
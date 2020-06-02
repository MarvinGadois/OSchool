// Action Login
export const SYNC_EMAIL = 'actions/SYNC_EMAIL';
export const SYNC_PASSWORD = 'actions/SYNC_PASSWORD';
export const LOGIN = 'actions/LOGIN';

export const syncEmail = (email) => ({ type: SYNC_EMAIL, email, });
export const syncPassword = (password) => ({ type: SYNC_PASSWORD, password, });
export const login = (history) => ({ type: LOGIN, history });

// Action Connected: true
export const CONNECTED = 'actions/CONNECTED';

export const connected = () => ({ type: CONNECTED });

// Action Disconnected: false
export const DISCONNECTED = 'actions/DISCONNECTED';

export const disconnected = () => ({ type: DISCONNECTED });

// action HomePage connected
export const HOMEPAGE_CONNECTED = 'actions/HOMEPAGE_CONNECTED';

export const homePageConnected = (history) => ({ type: HOMEPAGE_CONNECTED, history });

// action set Set User
export const SET_USER = 'actions/SET_USER';
//export const SET_USER_TOKEN = 'actions/SET_USER_TOKEN';

export const setUser = (user) => ({ type: SET_USER, user });
export const setUserToken = (token) => ({ type: SET_USER_TOKEN, token });

// action set opinion
export const SET_OPINIONS = 'actions/SET_OPINIONS';

export const setOpinions = (opinions) => ({ type: SET_OPINIONS, opinions })

// action reset login input
export const RESET_LOGIN_INPUT = 'actions/RESET_LOGIN_INPUT';

export const resetLoginInput = () => ({ type: RESET_LOGIN_INPUT });

// Action creator
export const INCREMENT = 'actions/INCREMENT';
export const incrementCounter = () => ({ type: INCREMENT });

// Action Login
export const SYNC_EMAIL = 'actions/SYNC_EMAIL';
export const SYNC_PASSWORD = 'actions/SYNC_PASSWORD';

export const syncEmail = (email) => ({
    type: SYNC_EMAIL,
    email,
});
export const syncPassword = (password) => ({
    type: SYNC_PASSWORD,
    password,
});
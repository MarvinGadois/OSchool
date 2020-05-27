export default (store) => (next) => (action) => {
    switch (action.type) {
        default: {
            console.log('ACTION:', action.type);
            next(action);
        }
    }
};
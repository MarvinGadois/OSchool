export default (store) => (next) => (action) => {
    switch (action.type) {
        default: {
            console.log("MW-LOGGER")
            console.log('ACTION:', action.type);
            next(action);
        }
    }
};
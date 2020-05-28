import { applyMiddleware } from 'redux';

import loggerMW from './logger';
// import auth from './auth';
// import webSocketMW from './websocket';
// import routesMW from './routes';

export default applyMiddleware(
    loggerMW,
    //   auth,
    //   webSocketMW,
    //   routesMW,
);
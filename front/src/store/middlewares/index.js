import { applyMiddleware } from 'redux';

import loggerMW from './logger';
import authMW from './auth';
import routesMW from './routes';

export default applyMiddleware(
    loggerMW,
    authMW,
    routesMW,
);
import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL } from './constant';

// Import action SET_OPINIONS
import { SET_OPINIONS } from '../store/actions';

const opinionsRequest = `${API_URL}v1/unsecured/opinion/`;

const getOpinions = (url = opinionsRequest) => {
    const promise = axios.get(url);
    promise.then((res) => {
        console.log(res.data)
        const opinions = res.data;
        store.dispatch({ type: SET_OPINIONS, payload: opinions })
    });
};

export default getOpinions;


//  http://ec2-54-152-201-144.compute-1.amazonaws.com/api/v1/unsecured/opinion/

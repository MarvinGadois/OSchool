import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_OPINIONS } from './constant';

// Import action SET_OPINIONS
import { setOpinions } from '../store/actions';

const opinionsRequest = `${API_URL}${GET_OPINIONS}`;

const getOpinions = (url = opinionsRequest) => {
    const promise = axios.get(url);
    promise.then((res) => {
        const opinions = res.data;
        store.dispatch(setOpinions(opinions))
    });
};

export default getOpinions;


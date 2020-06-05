//getNewsNoAuth

import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_NEWS_SIMPLE } from './constant';

// Import action SET_OPINIONS
import { setNewsSimple } from '../store/actions';

const newsSimpleRequest = `${API_URL}${GET_NEWS_SIMPLE}`;

const getNewsNoAuth = (url = newsSimpleRequest) => {

    axios.get(url)
        .then((res) => {
            const newsSimple = res.data;
            store.dispatch(setNewsSimple(newsSimple))
        });
};

export default getNewsNoAuth;


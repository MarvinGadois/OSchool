import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_NEWS } from './constant';

// Import action SET_OPINIONS
import { setNews } from '../store/actions';

const newsRequest = `${API_URL}${GET_NEWS}`;

const getNews = (url = newsRequest) => {

    axios.get(url)
        .then((res) => {
            const news = res.data;
            store.dispatch(setNews(news))
        });
};

export default getNews;
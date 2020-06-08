import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_SCHOOL_NEWS } from './constant';

// Import action SET_OPINIONS
import { setSchoolNews } from '../store/actions';

const notyf = new Notyf({
  duration: 3000,
  position: {
    x: 'center',
    y: 'top',
  },
});

const newsRequest = `${API_URL}${GET_SCHOOL_NEWS}`;

const getSchoolNews = (idSchool) => {
  axios
    .get(newsRequest + idSchool)
    .then((res) => {
      const news = res.data;
      store.dispatch(setSchoolNews(news));
    })
    .catch((error) => {
      notyf.error('Erreur requête news');
      console.trace(error);
    });
};

export default getSchoolNews;

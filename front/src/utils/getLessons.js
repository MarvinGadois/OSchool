import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_LESSONS } from './constant';

// Import action SET_OPINIONS
import { setLessons } from '../store/actions';

const LessonsRequest = `${API_URL}${GET_LESSONS}`;

const getLessons = (idUser) => {
  axios.get(LessonsRequest + idUser).then((res) => {
    const lessons = res.data;
    store.dispatch(setLessons(lessons));
  });
};

export default getLessons;

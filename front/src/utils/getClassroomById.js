import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_CLASS_BY_ID } from './constant';

// Import action SET_OPINIONS
import { setClassroom } from '../store/actions';

const classByIdRequest = `${API_URL}${GET_CLASS_BY_ID}`;

const getClassById = (idClass) => {
  axios
    .get(classByIdRequest + idClass)
    .then((res) => {
      const Oneclass = res.data;
      store.dispatch(setClassroom(Oneclass));
    })
    .catch((error) => {
      console.trace(error);
    });
};

export default getClassById;

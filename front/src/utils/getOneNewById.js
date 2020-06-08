import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_NEW_BY_ID } from './constant';

// Import action SET_OPINIONS
import { setOneNew } from '../store/actions';


const oneNewByIdRequest = `${API_URL}${GET_NEW_BY_ID}`;

const getOneNewById = (idNew) => {

    axios.get(oneNewByIdRequest + idNew)
        .then((res) => {
            const OneNew = res.data;
            store.dispatch(setOneNew(OneNew))
        })
        .catch((error) => {
            console.trace(error);
        });
};

export default getOneNewById;
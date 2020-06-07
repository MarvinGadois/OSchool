import axios from 'axios';
import store from '../store/index';

// Import base api url
import { API_URL, GET_GRADES_BY_USER } from './constant';

// Import action SET_OPINIONS
import { setGradesByUserId } from '../store/actions';


const gradesByUserIdRequest = `${API_URL}${GET_GRADES_BY_USER}`;

const getGradesByUserId = (idUser) => {

    axios.get(gradesByUserIdRequest + idUser)
        .then((res) => {
            const grades = res.data;
            //console.log(grades)
            store.dispatch(setGradesByUserId(grades))
        })
        .catch((error) => {
            console.trace(error);
        });
};

export default getGradesByUserId;
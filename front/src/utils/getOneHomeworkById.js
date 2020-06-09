import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_ONE_HOMEWORK_BY_ID } from "./constant";

// Import action SET_OPINIONS
import { setOneHomework } from "../store/actions";

const getOneHomeworkByIdRequest = `${API_URL}${GET_ONE_HOMEWORK_BY_ID}`;

const getOneHomeworkById = (idHomework) => {
  axios.get(getOneHomeworkByIdRequest + idHomework).then((res) => {
    const homework = res.data;
    // console.log("devoirs axios", homework);
    store.dispatch(setOneHomework(homework));
  });
};

export default getOneHomeworkById;

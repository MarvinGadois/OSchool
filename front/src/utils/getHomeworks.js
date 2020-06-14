import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_HOMEWORKS } from "./constant";

// Import action SET_OPINIONS
import { setHomeworks } from "../store/actions";

const HomeworksRequest = `${API_URL}${GET_HOMEWORKS}`;

const getHomeworks = (idUser) => {
  axios.get(HomeworksRequest + idUser).then((res) => {
    const homeworks = res.data;
    store.dispatch(setHomeworks(homeworks));
  });
};

export default getHomeworks;

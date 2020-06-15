import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_HOMEWORKS_BY_CLASSROOM } from "./constant";

// Import action setHomeworkClass
import { setHomeworkClass } from "../store/actions";

const homeworkClassByIdRequest = `${API_URL}${GET_HOMEWORKS_BY_CLASSROOM}`;

const getHomeworksByClassroom = (idClass) => {
  axios
    .get(homeworkClassByIdRequest + idClass)
    .then((res) => {
      const homeworks_by_classroom = res.data;
      console.log("gethomeworks", homeworks_by_classroom);
      store.dispatch(setHomeworkClass(homeworks_by_classroom));
    })
    .catch((error) => {
      console.trace(error);
    });
};

export default getHomeworksByClassroom;

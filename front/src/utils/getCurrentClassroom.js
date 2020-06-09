import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_CURRENT_CLASSROOM } from "./constant";

// Import action SET_OPINIONS
import { setCurrentClassroom } from "../store/actions";

const currentClassByIdRequest = `${API_URL}${GET_CURRENT_CLASSROOM}`;

const getCurrentClassById = (idCurrentClass) => {
  axios
    .get(currentClassByIdRequest + idCurrentClass)
    .then((res) => {
      const OneCurrentclass = res.data;
      store.dispatch(setCurrentClassroom(OneCurrentclass));
    })
    .catch((error) => {
      console.trace(error);
    });
};

export default getCurrentClassById;

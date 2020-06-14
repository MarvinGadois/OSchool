import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_LESSONS_BY_CLASSROOM } from "./constant";

// Import action setLessonClass
import { setLessonClass } from "../store/actions";

const lessonClassByIdRequest = `${API_URL}${GET_LESSONS_BY_CLASSROOM}`;

const getLessonsByClassroom = (idClass) => {
  axios
    .get(lessonClassByIdRequest + idClass)
    .then((res) => {
      const lessons_by_classroom = res.data;
      store.dispatch(setLessonClass(lessons_by_classroom));
    })
    .catch((error) => {
      console.trace(error);
    });
};

export default getLessonsByClassroom;

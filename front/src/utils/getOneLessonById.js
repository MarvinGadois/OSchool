import axios from "axios";
import store from "../store/index";

// Import base api url
import { API_URL, GET_ONE_LESSON_BY_ID } from "./constant";

// Import action SET_OPINIONS
import { setOneLesson } from "../store/actions";

const getOneLessonByIdRequest = `${API_URL}${GET_ONE_LESSON_BY_ID}`;

const getOneLessonById = (idLesson) => {
  axios.get(getOneLessonByIdRequest + idLesson).then((res) => {
    const lesson = res.data;
    // console.log("lecons axios", lesson);
    store.dispatch(setOneLesson(lesson));
  });
};

export default getOneLessonById;

// Import action
import {
  SYNC_EMAIL,
  SYNC_PASSWORD,
  SET_USER,
  SET_OPINIONS,
  CONNECTED,
  DISCONNECTED,
  RESET_LOGIN_INPUT,
  SET_SCHOOL_NEWS,
  SET_NEWS_SIMPLE,
  SET_CLASSROOM,
  SET_LESSONS,
  SET_HOMEWORKS,
  SET_ONE_LESSON,
  SET_ONE_HOMEWORK,
  SET_GRADES_BY_USER,
  SET_ONE_NEW,
  SET_CURRENT_CLASSROOM,
  SET_LESSONS_BY_CLASSROOM,
  SET_HOMEWORKS_BY_CLASSROOM,
  TOGGLE_MENU_NAVBAR,
} from "./actions";

// State initial
const initialState = {

  lessons: [],
  lessons_by_classroom: [],
  homeworks_by_classroom: [],
  lesson: [],
  homeworks: [],
  homework: [],
  user: {},
  email: '',
  password: '',
  connected: false,
  opinions: [],
  newsNoConnected: [],
  schoolNews: [],
  classrooms: [],
  gradesUser: [],
  OneNewById: [],
  currentClass: {},
  menuNavVisible: false,
};

export default (state = initialState, action = {}) => {

  switch (action.type) {
    case SYNC_EMAIL: {
      return {
        ...state,
        email: action.email,
      };
    }
    case SYNC_PASSWORD: {
      return {
        ...state,
        password: action.password,
      };
    }
    case SET_USER: {
      return {
        ...state,
        user: action.user,
      };
    }
    case SET_OPINIONS: {
      return {
        ...state,
        opinions: action.opinions,
      };
    }
    case CONNECTED: {
      return {
        ...state,
        connected: true,
      };
    }
    case DISCONNECTED: {
      localStorage.removeItem("jwtToken");
      return {
        ...state,
        connected: false,
        user: {},
        news: [],
        classrooms: [],
        lessons: [],
        menuNavVisible: false,
      };
    }
    case RESET_LOGIN_INPUT: {
      return {
        ...state,
        email: "",
        password: "",
      };
    }

    case SET_SCHOOL_NEWS: {
      return {
        ...state,
        schoolNews: action.news,
      };
    }
    case SET_NEWS_SIMPLE: {
      return {
        ...state,
        newsNoConnected: action.newsSimple,
      };
    }
    case SET_CLASSROOM: {
      return {
        ...state,
        classrooms: [...state.classrooms, action.Oneclass],
      };
    }
    case SET_LESSONS: {
      return {
        ...state,
        lessons: action.lessons,
      };
    }
    case SET_ONE_LESSON: {
      return {
        ...state,
        lesson: action.lesson,
      };
    }
    case SET_LESSONS_BY_CLASSROOM: {
      return {
        ...state,
        lessons_by_classroom: action.lessons_by_classroom,
      };
    }
    case SET_HOMEWORKS_BY_CLASSROOM: {
      return {
        ...state,
        homeworks_by_classroom: action.homeworks_by_classroom,
      };
    }
    case SET_GRADES_BY_USER: {
      return {
        ...state,
        gradesUser: action.grades,
      };
    }
    case SET_ONE_NEW: {
      return {
        ...state,
        OneNewById: action.oneNewe,
      };
    }

    case SET_HOMEWORKS: {
      return {
        ...state,
        homeworks: action.homeworks,
      };
    }
    case SET_ONE_HOMEWORK: {
      return {
        ...state,
        homework: action.homework,
      };
    }
    case SET_CURRENT_CLASSROOM: {
      return {
        ...state,
        currentClass: action.CurrentClass,
      };
    }
    case TOGGLE_MENU_NAVBAR: {
      return {
        ...state,
        menuNavVisible: !state.menuNavVisible,
      };
    }
    default: {
      return state;
    }
  }
};


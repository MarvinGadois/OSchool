// Action Login
export const SYNC_EMAIL = 'actions/SYNC_EMAIL';
export const SYNC_PASSWORD = 'actions/SYNC_PASSWORD';
export const LOGIN = 'actions/LOGIN';

export const syncEmail = (email) => ({ type: SYNC_EMAIL, email });
export const syncPassword = (password) => ({ type: SYNC_PASSWORD, password });
export const login = (history) => ({ type: LOGIN, history });

// Action Connected: true
export const CONNECTED = 'actions/CONNECTED';
export const connected = () => ({ type: CONNECTED });

// Action Disconnected: false
export const DISCONNECTED = 'actions/DISCONNECTED';
export const disconnected = (history) => ({ type: DISCONNECTED, history });

// action HomePage connected
export const HOMEPAGE_CONNECTED = 'actions/HOMEPAGE_CONNECTED';
export const homePageConnected = (history) => ({ type: HOMEPAGE_CONNECTED, history });

// action set Set User
export const SET_USER = 'actions/SET_USER';
export const setUser = (user) => ({ type: SET_USER, user });

// action set opinion
export const SET_OPINIONS = 'actions/SET_OPINIONS';
export const setOpinions = (opinions) => ({ type: SET_OPINIONS, opinions });

// action set news accueil non connecté
export const SET_NEWS_SIMPLE = 'actions/SET_NEWS_SIMPLE';
export const setNewsSimple = (newsSimple) => ({ type: SET_NEWS_SIMPLE, newsSimple });

// action set news
export const SET_SCHOOL_NEWS = 'actions/SET_SCHOOL_NEWS';
export const setSchoolNews = (news) => ({ type: SET_SCHOOL_NEWS, news });

// action reset login input
export const RESET_LOGIN_INPUT = 'actions/RESET_LOGIN_INPUT';
export const resetLoginInput = () => ({ type: RESET_LOGIN_INPUT });

// action set classes
export const SET_CLASSROOM = 'actions/SET_CLASSROOMS';
export const setClassroom = (Oneclass) => ({ type: SET_CLASSROOM, Oneclass });

// action set lessons
export const SET_LESSONS = 'actions/SET_LESSONS';
export const setLessons = (lessons) => ({ type: SET_LESSONS, lessons });

// action set one lesson
export const SET_ONE_LESSON = 'actions/SET_ONE_LESSON';
export const setOneLesson = (lesson) => ({ type: SET_ONE_LESSON, lesson });

// action set homeworks
export const SET_HOMEWORKS = 'actions/SET_HOMEWORKS';
export const setHomeworks = (homeworks) => ({ type: SET_HOMEWORKS, homeworks });

// action set one homework
export const SET_ONE_HOMEWORK = 'actions/SET_ONE_HOMEWORK';
export const setOneHomework = (homework) => ({ type: SET_ONE_HOMEWORK, homework });

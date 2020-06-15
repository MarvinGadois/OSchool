// Base API_URL 
export const API_URL = 'http://ec2-54-152-201-144.compute-1.amazonaws.com/api/';

// Route Login
export const LOGIN_URL = 'login_check';

// Route opinions
export const GET_OPINIONS = 'unsecured/v1/opinion';

// Route news connecté
export const GET_SCHOOL_NEWS = 'secured/v1/news/school/';

// Route news non connecté
export const GET_NEWS_SIMPLE = 'unsecured/v1/oschool/news';

// Route Recup info Classe par id
export const GET_CLASS_BY_ID = 'secured/v1/classroom/';

// Route Lessons
export const GET_LESSONS = 'secured/v1/lessons/user/';

// Route Lessons
export const GET_LESSONS_BY_CLASSROOM = 'secured/v1/lessons/classroom/';
// + on rajoute /id

// Route Lessons
export const GET_HOMEWORKS_BY_CLASSROOM = 'secured/v1/homework/classroom/';
// + on rajoute /id

// Route Lesson par id
export const GET_ONE_LESSON_BY_ID = 'secured/v1/lessons/';

// Route Homeworks
export const GET_HOMEWORKS = 'secured/v1/homework/user/';

// Route Homework par id
export const GET_ONE_HOMEWORK_BY_ID = 'secured/v1/homework/';
// + on rajoute /id

// Route Recup toutes les notes par utilisateur
export const GET_GRADES_BY_USER = 'secured/v1/grade/user/'
// + on rajoute /id

// Route recup une new par son id en secured
export const GET_NEW_BY_ID = 'secured/v1/news/';
// + on rajoute /id

// Route recup une classe par son id
export const GET_CURRENT_CLASSROOM = 'secured/v1/classroom/';
// + on rajoute /id de la classe

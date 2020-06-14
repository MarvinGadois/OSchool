import React from "react";
import { Route, Redirect, Switch } from "react-router";
import { useSelector, useDispatch } from "react-redux";

// Import action
import { connected } from 'src/store/actions';

// Import components
import Navbar from "src/components/Navbar";
import Footer from "src/components/Footer";
import HomePage from '../HomePage';
import Login from '../Login';

import TeacherClassroom from "src/components/Teacher_Classroom";
import AllNewsSchool from 'src/components/AllNewsSchool';
import OneNewSchool from 'src/components/OneNewSchool';
import Lessons_Student from "../Lessons_Student";
import Lessons_Teacher from "../Lessons_Teacher";
import OneHomeworkTeacher from "../OneHomeworkTeacher";
import OneHomeworkStudent from "../OneHomeworkStudent";
import OneLessonTeacher from "../OneLessonTeacher";
import OneLessonStudent from "../OneLessonStudent";
import Homeworks_Student from "../Homeworks_Student";
import Homeworks_Teacher from "../Homeworks_Teacher";
import Page404 from 'src/components/404';
import About from 'src/components/About';

// Import css
import "./styles.css";

// Composant
const App = () => {
  const userToken = localStorage.getItem("jwtToken");
  const dispatch = useDispatch();
  if (userToken) {
    dispatch(connected());
  }

  return (
    <div className="app">
      <Navbar />
      <Switch>
        <Route exact path="/">
          <HomePage />
        </Route>
        <Route exact path="/login">
          <Login />
        </Route>
        <Route exact path="/professeur/classe/:id">
          <TeacherClassroom />
        </Route>
        <Route exact path="/news">
          <AllNewsSchool />
        </Route>
        <Route exact path="/new/:id">
          <OneNewSchool />
        </Route>
        <Route exact path="/cours">
          <Lessons_Student />
        </Route>
        <Route exact path="/cours/:idLesson">
          <OneLessonStudent />
        </Route>
        <Route exact path="/devoirs">
          <Homeworks_Student />
        </Route>
        <Route exact path="/devoirs/:id">
          <OneHomeworkStudent />
        </Route>
        <Route exact path="/coursprof">
          <Lessons_Teacher />
        </Route>
        <Route exact path="/coursprof/:idLesson">
          <OneLessonTeacher />
        </Route>
        <Route exact path="/devoirsprof">
          <Homeworks_Teacher />
        </Route>
        <Route exact path="/devoirsprof/:id">
          <OneHomeworkTeacher />
        </Route>
        <Route exact path="/about">
          <About />
        </Route>
        <Route>
          <Page404 />
        </Route>
      </Switch>
      <Footer />
    </div>
  );
};

export default App;

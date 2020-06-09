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
import LessonsPages from "../LessonsPages";
import Lesson from "../Lesson";
import Homeworks from "../Homeworks";
import Homework from "../Homework"
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
        <Route exact path="/" ><HomePage /></Route>
        <Route exact path="/login"><Login /></Route>
        <Route exact path="/professeur/classe/:id"><TeacherClassroom/></Route>    
        <Route exact path="/news"><AllNewsSchool /></Route>
        <Route exact path="/new/:id"><OneNewSchool /></Route>
        <Route exact path="/cours"><LessonsPages /></Route>
        <Route exact path="/cours/:idLesson"><Lesson /></Route>
        <Route exact path="/devoirs"><Homeworks /></Route>
        <Route exact path="/devoirs/:id"><Homework /></Route>
        <Route exact path="/about"><About /></Route>
        <Route><Page404 /></Route>
      </Switch>
      <Footer /> 
    </div>
  );
};

export default App;

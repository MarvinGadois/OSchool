import React from "react";
import { Route, Redirect, Switch } from "react-router";
import { useSelector, useDispatch } from "react-redux";

// Import action
import { setUserToken, connected } from "src/store/actions";

// Import components
import Navbar from "src/components/Navbar";
import Footer from "src/components/Footer";
import HomePage from "../HomePage";
import LessonsPages from "../LessonsPages";
import Lesson from "../Lesson";
import Homeworks from "../Homeworks";
import Homework from "../Homework";
import Login from "../Login";

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
        <Route exact path="/cours">
          <LessonsPages />
        </Route>
        <Route exact path="/cours/:idLesson">
          <Lesson />
        </Route>
        <Route exact path="/devoirs">
          <Homeworks />
        </Route>
        <Route exact path="/devoirs/:id">
          <Homework />
        </Route>
        <Route>404</Route>
      </Switch>
      {/* <Footer /> */}
    </div>
  );
};

export default App;

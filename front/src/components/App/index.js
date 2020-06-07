import React from 'react';
import { Route, Redirect, Switch } from 'react-router';
import { useSelector, useDispatch } from 'react-redux';

// Import action
import { connected } from 'src/store/actions';


// Import components
import Navbar from "src/components/Navbar";
import Footer from "src/components/Footer";
import HomePage from '../HomePage';
import Login from '../Login';
import AllNewsSchool from 'src/components/AllNewsSchool';
import OneNewSchool from 'src/components/OneNewSchool';
import Page404 from 'src/components/404';

// Import css
import './styles.css';

// Composant
const App = () => {

  const userToken = (localStorage.getItem('jwtToken'));
  const dispatch = useDispatch();
  if (userToken) {
    dispatch(connected())
  }

  return (
    <div className="app">
      <Navbar />
      <Switch>
        <Route exact path="/" ><HomePage /></Route>
        <Route exact path="/login"><Login /></Route>
        <Route exact path="/news"><AllNewsSchool /></Route>
        <Route exact path="/new/:id"><OneNewSchool /></Route>
        <Route><Page404 /></Route>
      </Switch>
      <Footer />
    </div>
  );
};


export default App;

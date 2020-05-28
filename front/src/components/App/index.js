// == Import npm
import React from 'react';
import { Route, Redirect, Switch } from 'react-router';
//import { useDispatch, useSelector } from 'react-redux';

//import components
import Navbar from "src/components/Navbar";
import Footer from "src/components/Footer";
import HomePage from '../HomePage';

// == Import
import './styles.css';

// == Composant
const App = () => {

  return (
    <div className="app">
      <Navbar />
      <Switch>
        <Route exact path="/"><HomePage /></Route>
        <Route>404</Route>
      </Switch>
      <Footer />
    </div>
  );
};

// == Export
export default App;

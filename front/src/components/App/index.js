// == Import npm
import React from 'react';
//import { useDispatch, useSelector } from 'react-redux';

//import components
import Navbar from "src/components/Navbar";
import Footer from "src/components/Footer";
import HomePage from '../HomePage';

// == Import
import './styles.css';

// == Composant
const App = () => {
  //exemple
  // const dispatch = useDispatch();
  // const clickCount = useSelector((state) => state.counter);

  return (
    <div className="app">
      <Navbar />
      <HomePage />
      <Footer />
    </div>
  );
};

// == Export
export default App;

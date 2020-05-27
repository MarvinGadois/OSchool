// == Import npm
import React from 'react';
//import { useDispatch, useSelector } from 'react-redux';

//import components
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
      <HomePage />
    </div>
  );
};

// == Export
export default App;

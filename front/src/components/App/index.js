// == Import npm
import React from 'react';
import { useDispatch, useSelector } from 'react-redux';

// == Import
import reactLogo from './react-logo.svg';
import './styles.css';

// == Composant
const App = () => {
  const dispatch = useDispatch();
  const clickCount = useSelector((state) => state.counter);

  return (
    <div className="app">
      <img src={reactLogo} alt="react logo" />
      <h1>Composant : App</h1>
      <button
        type="button"
        onClick={(evt) => dispatch({ type: 'INCREMENT' })}
      >
        Clic-me ! ({clickCount})
      </button>
    </div>
  );
};

// == Export
export default App;

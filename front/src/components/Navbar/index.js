import React from "react";
import { useDispatch, useSelector } from 'react-redux';
import { NavLink } from 'react-router-dom';
import { useHistory } from 'react-router';
import Logo from "src/assets/O'school.png";



// Import action
import { disconnected } from 'src/store/actions';

// Import scss
import "./navbar.scss";



const Navbar = () => {
  const dispatch = useDispatch();
  const history = useHistory();

  const isAuthentified = useSelector((state) => state.connected);
  if (!isAuthentified) {
    return (
      <nav className="navbar">
        <a href="/" className="logo">
          <img className="logo" src={Logo} alt="logo" />
        </a>
        <input className="menu-btn" type="checkbox" id="menu-btn" />
        <label className="menu-icon" htmlFor="menu-btn">
          <span className="navicon" />
        </label>
        <ul className="menu">
          <li>
            <NavLink
              exact
              to={"/"}
            >
              Accueil
            </NavLink>
          </li>
          <li>
            <NavLink
              exact
              to={"/login"}
            >
              Connexion
            </NavLink>
          </li>
        </ul>
      </nav>
    );
  }

  return (
    <nav className="navbar">
      <a href="/" className="logo">
        <img className="logo" src={Logo} alt="logo" />
      </a>
      <input className="menu-btn" type="checkbox" id="menu-btn" />
      <label className="menu-icon" htmlFor="menu-btn">
        <span className="navicon" />
      </label>
      <ul className="menu">
        <li>
          <NavLink
            exact
            to={"/"}
          >
            Accueil
            </NavLink>
        </li>
        <li>
          <a href="/">Pédagogie</a>
        </li>
        <li>
          <a href="/">Vie Scolaire</a>
        </li>
        <li>
          <NavLink
            exact
            to={""}
            onClick={() => { dispatch(disconnected(history)) }}
          >
            Deconnexion
            </NavLink>
        </li>
      </ul>
    </nav>
  )
}

export default Navbar;

import React from "react";
import Logo from "src/assets/O'school.png";
import { useDispatch, useSelector } from 'react-redux';
import { disconnected } from 'src/store/actions';


// Style scss
import "./navbar.scss";

// == Router
import { NavLink } from 'react-router-dom';


const Navbar = () => {
  const dispatch = useDispatch()
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
            // activeClassName="menu-link--active"
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
              to={"/login"}
            // activeClassName="menu-link--active"
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
          // activeClassName="menu-link--active"
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
            to={"/"}
            onClick={() => { dispatch(disconnected()) }}
          // activeClassName="menu-link--active"
          >
            Deconnexion
            </NavLink>
        </li>
      </ul>
    </nav>
  )

}

export default Navbar;

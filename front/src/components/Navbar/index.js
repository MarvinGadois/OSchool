import React, { Component } from "react";
import Logo from "src/assets/O'school.png";
import "./navbar.scss";

// == Router
import { NavLink } from 'react-router-dom';

class Navbar extends Component {
  render() {
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
}

export default Navbar;

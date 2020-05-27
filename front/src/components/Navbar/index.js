import React, { Component } from "react";
import Logo from "src/assets/O'school.png";
import "./navbar.scss";

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
            <a href="/">Accueil</a>
          </li>
          <li>
            <a href="/">Pédagogie</a>
          </li>
          <li>
            <a href="/">Vie Scolaire</a>
          </li>
          <li>
            <a href="/">Connexion</a>
          </li>
        </ul>
      </nav>
    );
  }
}

export default Navbar;

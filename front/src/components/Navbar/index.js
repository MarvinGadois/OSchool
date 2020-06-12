import React from "react";
import { useDispatch, useSelector } from 'react-redux';
import { NavLink } from 'react-router-dom';
import { useHistory } from 'react-router';
import Logo from "src/assets/O'school.png";

import MenuNavbar from "./MenuNavbar/MenuNavbar";

// Import action
import { disconnected, TOGGLE_MENU_NAVBAR } from 'src/store/actions';

// Import scss
import "./navbar.scss";



const Navbar = () => {
  const dispatch = useDispatch();
  const history = useHistory();
  const isAuthentified = useSelector((state) => state.connected);
  const roleUser = useSelector((state) => state.user.roles);
  const currentUser = useSelector((state) => state.user.user)
  const { menuNavVisible } = useSelector((state) => state);

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
            <NavLink exact to={"/about"}>A propos</NavLink>
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

  // Role etudiant
  if (roleUser[0] === 'ROLE_STUDENT') {
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
            <NavLink exact to={"/"}>Accueil</NavLink>
          </li>
          <li>
            <NavLink exact to={"/cours"}>Cours</NavLink>
          </li>
          <li>
            <NavLink exact to={"/devoirs"}>Devoirs</NavLink>
          </li>
          <li>
            <NavLink
              className="student_deco"
              exact
              to={""}
              onClick={() => { dispatch(disconnected(history)) }}
            >
              Déconnexion
            </NavLink>
          </li>
        </ul>
        <div className="navbar_user_info">
          <div>
            <p>{currentUser.firstname}</p>
            <p>{currentUser.lastname}</p>
          </div>
          <img
            onClick={() => { dispatch({ type: TOGGLE_MENU_NAVBAR }) }}
            id="img_nabar_user" src="https://www.nicepng.com/png/detail/804-8049853_med-boukrima-specialist-webmaster-php-e-commerce-web.png"></img>
        </div>
        {menuNavVisible && <MenuNavbar />}
      </nav>
    )
  }
  // Role professeur
  else if (roleUser[0] === 'ROLE_TEACHER') {
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
            <NavLink exact to={"/"}>Accueil</NavLink>
          </li>
          <li>
            <NavLink exact to={"/cours"}>Cours</NavLink>
          </li>
          <li>
            <NavLink exact to={"/devoirs"}>Devoirs</NavLink>
          </li>
          <li>
            <NavLink
              className="student_deco"
              exact
              to={""}
              onClick={() => { dispatch(disconnected(history)) }}
            >
              Déconnexion
            </NavLink>
          </li>
        </ul>
        <div className="navbar_user_info">
          <div>
            <p>{currentUser.firstname}</p>
            <p>{currentUser.lastname}</p>
          </div>
          <img
            onClick={() => { dispatch({ type: TOGGLE_MENU_NAVBAR }) }}
            id="img_nabar_user" src="https://mybluerobot.com/wp-content/uploads/2015/04/myAvatar-29.png"></img>
        </div>
        {menuNavVisible && <MenuNavbar />}
      </nav>
    )
  }

}

export default Navbar;

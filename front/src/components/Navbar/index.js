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
  const roleUser = useSelector((state) => state.user.roles);


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
              exact
              to={""}
              onClick={() => { dispatch(disconnected(history)) }}
            >
              Deconnexion
            </NavLink>
          </li>
        </ul>
        <div className="navbar_user_info">
          <img id="img_nabar_user" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
          <div>
            <p>Firstname</p>
            <p>Lastname</p>
          </div>
        </div>
      </nav>
    )
  } else if (roleUser[0] === 'ROLE_TEACHER') {
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
              exact
              to={""}
              onClick={() => { dispatch(disconnected(history)) }}
            >
              Deconnexion
            </NavLink>
          </li>
        </ul>
        <div className="navbar_user_info">
          <img id="img_nabar_user" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
          <div>
            <p>Firstname</p>
            <p>Lastname</p>
          </div>
        </div>
      </nav>
    )
  }

}

export default Navbar;

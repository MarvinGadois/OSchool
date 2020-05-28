import React from 'react';

// import style
import './style.css';
import icon1 from 'src/assets/icon-inscription.png';
import icon2 from 'src/assets/icon-students.png';
import icon3 from 'src/assets/icon-light.jpg';
import logo from "src/assets/O'school.png";


const Description = () => {
  return (
    <div className="description">
      <div className="container">
        <h1>Bienvenue sur <img className="logo" src={logo} alt="logo O'school" /></h1>

        <div className="description_main">
          <p>O’school est une plateforme web facilitant les échanges en ligne entre
            les différent parties de l’éducation.
          </p>
        </div>
      </div>

      <div>
        <img className="icon" src={icon1} alt="icon inscription"/>
        <p>Inscription effectuée par l’administration</p>

      </div>
      <div>

      <img className="icon" src={icon2} alt="icon inscription"/>
        <p>Accès facile et en direct de tous les documents</p>

      </div>

      <div>

      <img className="icon" src={icon3} alt="icon inscription"/>
        <p>Simple et intuitif</p>

      </div>
    </div>
  );
};

export default Description;

import React from 'react';

// Import style
import './style.scss';
import icon1 from 'src/assets/icon-inscription.png';
import icon2 from 'src/assets/icon-students.png';
import icon3 from 'src/assets/icon-light.jpg';
import logo from "src/assets/O'school.png";



const Description = () => {

  return (
    <div className="description">
      <div className="container-head">
        <div className="last-container-head">
          <h1>Bienvenue sur </h1>
          <img className="logo" src={logo} alt="logo O'school" />
        </div>
      </div>

      <div className="description_main">
        <p>O’school est une plateforme web facilitant les échanges en ligne entre

        les différentes parties de l’éducation.
        </p>
      </div>



      <div className="container-body">
        <div className="catchphrase">

          <div className="help-view">
            <img className="icon" src={icon1} alt="icon inscription" />
            <p>Inscription effectuée par l’administration</p>
          </div>

          <div className="help-view">
            <img className="icon" src={icon3} alt="icon inscription" />
            <p>Simple et intuitif</p>
          </div>

          <div className="help-view">
            <img className="icon" src={icon2} alt="icon inscription" />
            <p>Accès facile et en direct de tous les documents</p>
          </div>

        </div>

        <div className="paragraphs">
          <div className="paragraphs-content">
            <h2>Administration</h2>
            <p>Notre système de gestion de vie scolaire réduit le travail administratif des écoles, des enseignants, mais aussi des élèves et des parents. Notamment avec la centralisation de tous les documents liés à l’éducation.
            </p>
            <hr className="paragraphs-hr"></hr>
          </div>
          <div className="paragraphs-content">
            <h2>Enseignants</h2>
            <p>O’school permet la gestion des enseignants, nous fournissons une interface pour consulter les

            emplois du temps, enregistrer les résultats des élèves et le cahier de correspondance.

            </p>
            <hr className="paragraphs-hr"></hr>
          </div>
          <div className="paragraphs-content">
            <h2>Parents-Elèves</h2>
            <p>Cette plateforme est une solution très appréciée par la communauté parentale. Nous assurons le suivi scolaire de leurs enfants tout en veillant au respect de la confidentialité de leurs données personnelles.</p>
          </div>

        </div>

      </div>
    </div>
  );
};

export default Description;

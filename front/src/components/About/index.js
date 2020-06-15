import React from 'react';
import Logo_about from "../../assets/about.svg";

import './styles.scss';
import dumbledore from "../../assets/dumbledore.png";
import ron from "../../assets/ron.jpeg";
import hermione from "../../assets/hermione.jpeg";
import harry from "../../assets/harry.png";
import sirius from "../../assets/sirius.jpeg";



const About = () => {
    return (
        <div className="container_about">
            {/* <h1>About</h1> */}
            <div className="container_about_head">

                <h2>Pourquoi ce projet</h2>
                <div>
                  <p>L’idée du projet sur lequel nous travaillons nous est venue au cours du confinement   lors duquel la scolarité est devenue compliquée pour bons nombres d’établissements scolaires. Ceux-ci se sont retrouvés dépassés par les événements, mais aussi par le manque de moyens pédagogiques mis à leur disposition. il est devenu compliqué de mener à bien la scolarité de leurs étudiants confinés loin des salles de classe traditionnelles.
                  </p>
                  <p> Nous avons pour objectif de créer une plateforme qui faciliterait la communication et les échanges entre les différents acteurs des établissements scolaires, Ayant besoin d’un soutien dans la mise en place de l’instruction à distance. Cette solution permettrait aux professeurs de partager leurs ressources aux élèves qui pourront donc les récupérer facilement. De plus, par la suite les parents d’élèves pourront suivre la scolarité de leurs enfants plus simplement.
                  </p>

                </div>

            </div>
            <div className="container_about_content" >
                <h2>Notre equipe</h2>
                <div className="container_about_content_team">
                    <div className="container_about_content_team_card">
                        <img src={hermione}></img>
                        <p>Sarah</p>
                        <p>Product Owner</p>
                        <p>Backend</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src={harry}></img>
                        <p>Marvin</p>
                        <p>Lead dev Back</p>
                        <p>Backend</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src={ron}></img>
                        <p>Ahmad</p>
                        <p>QA</p>
                        <p>Frontend</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src={sirius}></img>
                        <p>Aymeric</p>
                        <p>Git Master</p>
                        <p>ScrumMaster</p>
                        <p>Frontend</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src={dumbledore}></img>
                        <p>Samy</p>
                        <p>Lead dev Frontend</p>
                        <p>Backend</p>
                    </div>
                </div>
                <img id="img_about" src={Logo_about} />
            </div>
        </div>
    );
};

export default About;

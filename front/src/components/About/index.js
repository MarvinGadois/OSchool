import React from 'react';
import Logo_about from "../../assets/about.svg";

import './styles.scss';


const About = () => {
    return (
        <div className="container_about">
            {/* <h1>About</h1> */}
            <div className="container_about_head">

                <h2>Pourquoi ce projet</h2>
                <div>
                    <p>L’idée du projet sur lequel nous travaillons nous est venu au cours du confinement lors duquel la scolarité est devenue compliquée pour bons nombres d’établissements scolaires. Ceux-ci se sont retrouvés dépassés par les événements, mais aussi par le manque de moyens pédagogiques mis à leur disposition.
                    Pour mener à bien la scolarité de leurs étudiants confinés loin des salles de classe traditionnelles nous avons pour objectif de créer une plateforme qui faciliterait la communication et les échanges entre les différents acteurs des établissements scolaires ayant besoin d’un soutien dans la mise en place de l’instruction à distance.
                    Cette solution permettrait aux professeurs de partager leurs ressources aux élèves qui pourront donc les récupérer facilement. De plus, les parents d’élèves pourront suivre la scolarité de leurs enfants simplement.
            </p>

                </div>

            </div>
            <div className="container_about_content" >
                <h2>Notre equipe</h2>
                <div className="container_about_content_team">
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Sarah</p>
                        <p>Rôle</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Marvin</p>
                        <p>Rôle</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Ahmad</p>
                        <p>Rôle</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Aymeric</p>
                        <p>Rôle</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Samy</p>
                        <p>Rôle</p>
                    </div>
                </div>
                <img id="img_about" src={Logo_about} />
            </div>
        </div>
    );
};

export default About;

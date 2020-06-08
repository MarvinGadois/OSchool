import React from 'react';

import './styles.scss';


const About = () => {
    return (
        <div className="container_about">
            {/* <h1>About</h1> */}
            <div className="container_about_head">
                <h2>Pourquoi ce projet</h2>
                <p>hufhiuhyfuiodhzfvuzygozhuouroioizuoujoruz_àur_çu_çzuj_juoiguz_ougàç</p>
            </div>
            <div className="container_about_content" >
                <h2>Notre equipe</h2>
                <div className="container_about_content_team">
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Sarah</p>
                        <p>Role</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Marvin</p>
                        <p>Role</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Ahmad</p>
                        <p>Role</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Aymeric</p>
                        <p>Role</p>
                    </div>
                    <div className="container_about_content_team_card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                        <p>Samy</p>
                        <p>Role</p>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default About;
import React from 'react';

import './styles.scss';


const HomePageStudent = () => {
    return (
        <div className="container--homeStudent">
            <h1>Bienvenue Home Page ETUDIANT</h1>
            <div className="container--homeStudent--info">
                <p>ici toutes les infos student</p>
            </div>
            <div className="container--homeStudent--classes">
                <p>ici toutes les classes student</p>
            </div>
            <div className="container--homeStudent--homework">
                <p>ici toutes les homeworks student</p>
            </div>
        </div>
    )
}



export default HomePageStudent;
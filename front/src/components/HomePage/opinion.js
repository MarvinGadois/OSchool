import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';

// Import getOpinions
import getOpinions from '../../utils/getOpinions';

// Import style
import './style.css';

const Opinion = () => {
    const { opinions } = useSelector((state) => state)
    useEffect(getOpinions, []);

    const allOpinions = opinions.map((opinion) => (
        <div key={opinion.id} className="one_opinion">
            <div className="opinion_user_info">
                {/* <img src={`${opinion.user.image}`}></img> */}
                <div className="opinion_user_perso">
                    <h4>Nom: <span className="spanGrey">{opinion.user.firstname}</span></h4>

                    <p>Role: <span className="spanGrey">{opinion.user.roles.map(role => `${role.slice(5).toLowerCase()} `)}</span></p>

                </div>
            </div>
            <hr className="hrclasses" />
            <div className="one_opinion_content">
                <p>{opinion.content}</p>
            </div>
        </div>
    ));

    return (
        <div className="opinion">
            <h2>Avis de nos utlisateurs</h2>
            <div className=" opinion_container">
                {allOpinions}
            </div>
        </div>
    );
};

export default Opinion;
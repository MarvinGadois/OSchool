import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';

// Import getOpinions
import getOpinions from '../../utils/getOpinions';

// Import style
import './style.scss';

const Opinion = () => {
    const { opinions } = useSelector((state) => state)
    useEffect(getOpinions, []);
    const allOpinions = opinions.map(opinion => {
        const DateComment3 = new Date(opinion.date);

        return (
            <div key={opinion.id} className="one_opinion">
                <div className="opinion_user_info">
                    {/* <img src={`${opinion.user.image}`}></img> */}
                    <div className="opinion_user_perso">
                        <h4><span className="spanGrey">{opinion.user.firstname} {opinion.user.lastname}</span></h4>

                        <p><span className="spanGrey">{(opinion.user.roles[0] === "ROLE_STUDENT") ? "Eleve" : "Professeur"}</span></p>

                        {/* <p>Role: <span className="spanGrey">{opinion.user.roles.map(role => `${role.slice(5).toLowerCase()} `)}</span></p> */}

                    </div>
                </div>
                <hr className="hrclasses" />
                <div className="one_opinion_content">
                    <p>{opinion.content}</p>
                </div>
                <div className="opinionDate">
                    <p className="spanGrey">Posté le: {DateComment3.toLocaleString(undefined)}</p>
                </div>
            </div>
        )
    })

    return (
        <div className="opinion">
            <h2>Avis de nos utilisateurs</h2>
            <div className=" opinion_container">
                {allOpinions}
            </div>
        </div>
    );
};

export default Opinion;
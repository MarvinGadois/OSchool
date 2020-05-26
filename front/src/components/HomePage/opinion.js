import React from 'react';

// import style
import './style.css';

const Opinion = () => {

    const opinions = OpinionsUser.map((opinion) => (
        <div key={opinion.id} className="one_opinion">
            <div className="opinion_user_info">
                <img src={opinion.avatar}></img>
                <div className="opinion_user_perso">
                    <h4>Nom: <span className="spanGrey">{opinion.name}</span></h4>
                    <p>Role: <span className="spanGrey">{opinion.role}</span></p>
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
                {opinions}
            </div>
        </div>
    );
};

// FAKE DONNEE
const OpinionsUser = [
    {
        id: 1, content: "j'ai vraiment apprecié utiliser ce site tres ergonomique fdhdfh dhdhf hsdhh hsdfhfds hsdhhd hhddd", avatar: 'https://dreambuilders.dk/wp-content/uploads/2015/03/myAvatar-61.png', name: 'Lionel', role: "Professeur d'anglais",
    },
    {
        id: 2, content: " c'est genial merci fdhdfh dhdhf hsdhh hsdfhfds hsdhhd hhddd", avatar: 'https://i.pinimg.com/originals/4b/5d/19/4b5d1954fbb5b6bad18f0ac25c4ab3c3.png', name: 'Fabienne', role: 'Eleve',
    },
    {
        id: 3, content: 'Tres pratique pour suivre apres les cours  fdhdfh dhdhf hsdhh hsdfhfds hsdhhd hhddd', avatar: 'https://mybluerobot.com/wp-content/uploads/2015/04/myAvatar-29.png', name: 'Tony', role: 'Professeur math',
    },
];

export default Opinion;
import React from 'react';

// import style
import './style.css';

const LastNews = () => {

    const news = lastNews.map((newOne) => (
        <div key={newOne.id} className="one_news_card">
            <h3>{newOne.titre}</h3>
            <img className="img_one_news" src={newOne.image}></img>
        </div>
    ))

    return (
        <div className="last_news">
            <h2>Dernières actualités</h2>
            {news}
        </div>
    )
};



// FAKE DONNEE
const lastNews = [
    {
        id: 1, titre: "Titre news", image: 'https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png',
    },
    {
        id: 2, titre: "Titre news", image: 'https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png',
    },
    {
        id: 3, titre: "Titre news", image: 'https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png',
    },
    {
        id: 4, titre: "Titre news", image: 'https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png',
    },
    {
        id: 5, titre: "Titre news", image: 'https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png',
    },

];

export default LastNews;
import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';


// Import getNewsNoAuth
import getNewsNoAuth from '../../utils/getNewsNoAuth';

// Import style
import './style.css';

const LastNews = () => {
    const { newsNoConnected } = useSelector((state) => state)
    useEffect(getNewsNoAuth, []);

    const news = newsNoConnected.map((newOne) => (
        <div key={newOne.id} className="one_news_card_container">
            <div className="one_news_card_head">
                <img className="img_one_news" src="https://via.placeholder.com/150"></img>
                <h3>{newOne.title}</h3>
            </div>
            <hr className="one_news_card_hr"></hr >
            <div className="one_news_card_body">
                <p>{newOne.content}</p>
            </div>
        </div>
    ))

    return (
        <div className="last_news"  >
            <h2>Dernières actualités</h2>
            {news}
        </div>
    )
};


export default LastNews;
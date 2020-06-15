import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';


// Import getNewsNoAuth
import getNewsNoAuth from '../../utils/getNewsNoAuth';

// Import style
import './style.scss';

const LastNews = () => {
    const { newsNoConnected } = useSelector((state) => state)
    useEffect(getNewsNoAuth, []);

    const news = newsNoConnected.slice(0, 2).map((newOne) => (
        <div key={newOne.id} className="one_news_card_container">
            <div className="one_news_card_head">
                <img className="img_one_news" src="https://www.expatica.com/app/uploads/sites/5/2018/11/shutterstock_251933845-new-1200x675.jpg"></img>
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
            <div className="news_card_container">
                {news}
            </div>
        </div>
    )
};


export default LastNews;
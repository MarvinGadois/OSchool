import React from 'react';

// import style
import './style.css';

const LastNews = () => {
    return (
        <div className="last_news">
            <div className="one_news_card">
                <h3>titre news</h3>
                <img className="img_one_news" src={image_news}></img>
            </div>
            <div className="one_news_card">
                <h3>titre news</h3>
                <img className="img_one_news" src={image_news}></img>
            </div>
            <div className="one_news_card">
                <h3>titre news</h3>
                <img className="img_one_news" src={image_news}></img>
            </div>
            <div className="one_news_card">
                <h3>titre news</h3>
                <img className="img_one_news" src={image_news}></img>
            </div>
            <div className="one_news_card">
                <h3>titre news</h3>
                <img className="img_one_news" src={image_news}></img>
            </div>
        </div>
    );
};

const image_news = "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png"

export default LastNews;
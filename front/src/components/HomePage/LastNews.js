import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from 'react-router';
// Import getNewsNoAuth
import getNewsNoAuth from "../../utils/getNewsNoAuth";

// Import style
import "./style.scss";

const LastNews = () => {
  const { newsNoConnected } = useSelector((state) => state);
  useEffect(getNewsNoAuth, []);

  const images = [
    {
      id: 1,
      image:
        "https://www.winjigo.com/wp-content/uploads/2016/09/design-classroom-layout.png",
      title: "firstNews",
      description: "news1",
    },
    {
      id: 2,
      image:
        "https://sites.google.com/a/pennridge.us/pennridge-school-district/_/rsrc/1584377601007/home/school-tools.png",
      title: "secondNews",
      description: "news2",
    },
  ];



  const news = newsNoConnected.slice(0, 2).map((newOne, index) => (
    <div key={newOne.id} className="one_news_card_container">
      <div className="one_news_card_head">
        <img
          className="img_one_news"
          src={images[index].image}
        />
        <h3>{newOne.title}</h3>
      </div>
      <hr className="one_news_card_hr"></hr>
      <div className="one_news_card_body">
        <p>{newOne.content}</p>
      </div>
    </div>
  ));

  return (
    <div className="last_news">
      <h2>Dernières actualités</h2>
      <div className="news_card_container">{news}</div>
      {/* <div className="go_all_news">
        <a href="/news">
          Voir tous les articles...
        </a>
      </div> */}
    </div>
  );
};

export default LastNews;

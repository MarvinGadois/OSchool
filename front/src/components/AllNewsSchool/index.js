import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useHistory } from 'react-router';

import getSchoolNews from '../../utils/getSchoolNews';

import './styles.scss';

const AllNewsSchool = () => {
    const history = useHistory();
    const currentUser = useSelector((state) => state.user.user);
    const { schoolNews } = useSelector((state) => state);

    useEffect(() => { getSchoolNews(currentUser.schools[0].id) }, []);


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
        {
          id: 3,
          image:
            "https://fr.metrotime.be/wp-content/uploads/2016/12/harrypotter.jpg",
          title: "secondNews",
          description: "news2",
        },
        {
          id: 3,
          image:
            "https://image.jimcdn.com/app/cms/image/transf/dimension=1920x10000:format=jpg/path/s18e1e54be0b25a0e/image/i2d8ed1c7a141619e/version/1504816821/image.jpg",
          title: "secondNews",
          description: "news2",
        },
        {
          id: 4,
          image:
            "https://upload.wikimedia.org/wikipedia/commons/a/ac/HarryPotterExhibition_CiteDuCinema_ParisSaintDenis_%2835%29.jpg",
          title: "secondNews",
          description: "news2",
        },
      ];


    const AllNewsSchoolConnected = schoolNews.map((schoolnew, index) => {
        const DateComment2 = new Date(schoolnew.date);
        return (
          <div
            onClick={() => history.push(`/new/${schoolnew.id}`)}
            key={schoolnew.id}
            className="container-One-News"
          >
            <h2>{schoolnew.title}</h2>
            <img
              className="img_one_news"
              src={images[index < images.length ? index : 1].image}
            />
            <p>{schoolnew.content}</p>
            <div className="dateNews">
              <p className="spanGrey">
                Posté le: {DateComment2.toLocaleString(undefined)}
              </p>
            </div>
            <hr></hr>
          </div>
        );
    })

    return (
      <div className="container-AllSchollNews">
        <h1>
          Les articles de l'établissement
          <span className="badge badge-primary ml-2">{schoolNews.length}</span>
        </h1>
        <div style={{ textAlign: "center" }} className="container-All-News">
          {AllNewsSchoolConnected}
        </div>
      </div>
    );
};

export default React.memo(AllNewsSchool);

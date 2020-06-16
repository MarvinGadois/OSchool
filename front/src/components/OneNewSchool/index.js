import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useParams } from "react-router";
import { useHistory } from "react-router";

import getOneNewById from '../../utils/getOneNewById';


import './styles.scss';

const OneNewSchool = () => {
    const history = useHistory();
    let { id } = useParams();
    const { OneNewById } = useSelector((state) => state);

    useEffect(() => { getOneNewById(id) }, []);


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

  

      // const MapImages = images.map((index) => {
      //   return (
      //     <img
      //       key={images}
      //       src={images[index < images.length ? index : 1].image}
      //       className="img-responsive"
      //     />
      //   );
      // });


    const DateComment3 = new Date(OneNewById.date);
    return (
      <div className="fixonenew">
        <div className="btn-group dropleft">
          <button
            type="button"
            className="btn btn-secondary dropdown-toggle m-4"
            onClick={() => history.push(`/news`)}
            style={{ backgroundColor: "#335C81" }}
          >
            Revenir aux news
          </button>
        </div>
        <div style={{ textAlign: "center" }} className="container-one-new">
          <h2>{OneNewById.title}</h2>
          <img key={images} src={images[0].image} className="img-responsive" />
          <p className="one-new-content">{OneNewById.content}</p>
          <div className="dateNews2">
            <p className="spanGrey">
              Posté le: {DateComment3.toLocaleString(undefined)}
            </p>
          </div>
        </div>
      </div>
    );
};



export default OneNewSchool;

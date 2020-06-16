import React, { useEffect } from "react";
import { useHistory } from "react-router";
import { useSelector } from "react-redux";
//import imageFolders from '../../../../back/public/assets/images';

import getSchoolNews from "../../utils/getSchoolNews";
import getGradesByUserId from "../../utils/getGradesByUserId";

import "./styles.scss";


const HomePageStudent = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { schoolNews } = useSelector((state) => state);
  const { gradesUser } = useSelector((state) => state);
  useEffect(() => {
    getSchoolNews(currentUser.schools[0].id);
  }, []);
  useEffect(() => {
    getGradesByUserId(currentUser.id);
  }, []);

  //currentUser.classrooms.map(classe => { useEffect(() => { getClassById(classe.id) }, []); })

  const DetailsNote = gradesUser.map((oneGrade, i) => {
    return (
      <tr key={oneGrade.id}>
        <th scope="row">{i + 1}</th>
        <td>{oneGrade.title}</td>
        <td>{oneGrade.grade}</td>
        <td>{oneGrade.content}</td>
      </tr>
    );
  });

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

  const NewsSchoolConnected = schoolNews.map((schoolnew, ix) => {
    const DateComment = new Date(schoolnew.date);
    return (
      <div key={schoolnew.id} className="one_news_card_container">
        <div className="one_news_card_head">
          <img
            className="img_one_news"
            src={images[ix < images.length ? ix : 1].image}
          ></img>
          <h3>{schoolnew.title}</h3>
        </div>
        <hr className="one_news_card_hr"></hr>
        <div className="one_news_card_body">
          <p>{schoolnew.content}</p>
          <div className="newsDateConnected">
            <p className="spanGrey">
              Posté le: {DateComment.toLocaleString(undefined)}
            </p>
          </div>
        </div>
      </div>
    );
  });

  return (
    <div className='bg'>
    <div className="container">
      <div className="container--homeStudent">
        <h1>Bienvenue {currentUser.firstname}</h1>
        <div className="container--homeStudent--news">
          <h2>Dernières infos de l'établissement</h2>
          <div className="news_card_container">
            {NewsSchoolConnected.slice(0, 2)}
          </div>
          <div className="go_all_news">
            <p onClick={() => history.push("/news")} className="access">
              Lire les
              <span className="badge badge-primary">{schoolNews.length}</span>
              articles suivants...
            </p>
          </div>
        </div>
        <div className="container--homeStudent--classes">
          <h2>
            Devoirs et notes
            <span className="badge badge-primary ml-2">
              {gradesUser.length}
            </span>
          </h2>
          <div className="container--homeStudent--classes-tableau">
            <table className="table">
              <thead className="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titres devoirs</th>
                  <th scope="col">Notes</th>
                  <th scope="col">Commentaires</th>
                </tr>
              </thead>
              <tbody>{DetailsNote.length >= 1 && [DetailsNote]}</tbody>
            </table>
          </div>
        </div>

        <div className="container--homeStudent--info">
          <h2>Informations</h2>
          <div className="container--homeStudent--info--content">
            <div className="container--homeStudent--info--content--shedule">
              <h3>Emploi du temps</h3>
              <img src="https://ahogwartsstudent.files.wordpress.com/2017/11/hogwarts-timetable1.jpg"></img>
            </div>

            <div className="container--homeStudent--info--content--perso">
              <div className="container--homeStudent--info--content--perso--head">
                <img src="https://www.nicepng.com/png/detail/804-8049853_med-boukrima-specialist-webmaster-php-e-commerce-web.png"></img>
                <h5>
                  <span className="titlecardInfo">Elève: </span>
                  {currentUser.lastname}
                </h5>
              </div>
              <hr></hr>
              <div className="container--homeStudent--info--content--perso--body">
                <p>
                  <span className="titlecardInfo">Email:</span>{" "}
                  {currentUser.email}
                </p>
                <p>
                  <span className="titlecardInfo">Role:</span>{" "}
                  {currentUser.roles[0] === "ROLE_STUDENT"
                    ? "Elève"
                    : "Professeur"}
                </p>
                <p>
                  <span className="titlecardInfo">Etablissement:</span>{" "}
                  {currentUser.schools[0].name}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  );
};

export default HomePageStudent;

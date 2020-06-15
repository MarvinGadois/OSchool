import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";
//import imageFolders from '../../../../back/public/assets/images';

import getSchoolNews from "../../utils/getSchoolNews";
import getClassById from "../../utils/getClassroomById";

import "./styles.scss";

const HomePageTeacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { schoolNews } = useSelector((state) => state);
  const { classrooms } = useSelector((state) => state);

  useEffect(() => {
    getSchoolNews(currentUser.schools[0].id);
  }, []);

  currentUser.classrooms.map((classe) => {
    useEffect(() => {
      classrooms != "" ? null : getClassById(classe.id);
    }, []);
  });

  const DetailsClass = classrooms.map((oneClass, i) => {
    const NbStudentClasse = oneClass.users.filter((user) => {
      return user.roles[0] === "ROLE_STUDENT";
    });

    return (
      <tr key={oneClass.id}>
        <th scope="row">{i + 1}</th>
        <td>
          <i
            onClick={() => history.push(`/professeur/classe/${oneClass.id}`)}
            className="fa fa-eye mr-3 teacher_i"
            aria-hidden="true"
          ></i>
          {oneClass.name}
        </td>
        <td>{NbStudentClasse.length}</td>
        <td>{oneClass.level}</td>
        <td>{oneClass.school.name}</td>
      </tr>
    );
  });

  const NewsSchoolConnected = schoolNews.map((schoolnew) => {
    const DateComment = new Date(schoolnew.date);
    return (
      <div key={schoolnew.id} className="one_news_card_container">
        <div className="one_news_card_head">
          <img
            className="img_one_news"
            src="https://cap.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fcap.2F2020.2F04.2F14.2Fcc9a7052-4132-4ac9-9bd5-2d8bf381e784.2Ejpeg/750x375/background-color/ffffff/quality/70/retour-a-lecole-le-11-mai-le-gouvernement-est-alle-contre-lavis-du-conseil-scientifique-1368448.jpg"
          />
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
    <div className="container">
      <div className="container--homeTeacher">
        <h1>Bienvenue {currentUser.firstname}</h1>
        <div className="container--homeTeacher--news">
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
        <div className="container--homeTeacher--classes">
          <h2>
            Vos classes
            <span className="badge badge-primary ml-2">
              {classrooms.length}
            </span>
          </h2>
          <div className="container--homeTeacher--classes-tableau">
            <table className="table">
              <thead className="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Nombre d'élèves</th>
                  <th scope="col">Niveau</th>
                  <th scope="col">Établissement</th>
                </tr>
              </thead>
              <tbody>{classrooms.length >= 1 && [DetailsClass]}</tbody>
            </table>
          </div>
        </div>

        <div className="container--homeTeacher--info">
          <h2>Informations</h2>
          <div className="container--homeTeacher--info--content">
            <div className="container--homeTeacher--info--content--shedule">
              <h3>Emploi du temps</h3>
              <img src="https://ahogwartsstudent.files.wordpress.com/2017/11/hogwarts-timetable1.jpg"></img>
            </div>
            <div className="container--homeTeacher--info--content--perso">
              <div className="container--homeTeacher--info--content--perso--head">
                <img src="https://mybluerobot.com/wp-content/uploads/2015/04/myAvatar-29.png"></img>
                <h5>
                  <span className="titlecardInfo">Professeur: </span>{" "}
                  {currentUser.lastname}
                </h5>
              </div>
              <hr></hr>
              <div className="container--homeTeacher--info--content--perso--body">
                <p>
                  <span className="titlecardInfo">Email:</span>
                  {currentUser.email}
                </p>
                <p>
                  <span className="titlecardInfo">Role:</span>
                  {currentUser.roles[0] === "ROLE_STUDENT"
                    ? "Élève"
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
  );
};

export default HomePageTeacher;

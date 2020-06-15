import React, { useEffect } from 'react';
import { useHistory } from 'react-router';
import { useSelector } from 'react-redux';
//import imageFolders from '../../../../back/public/assets/images';


import getSchoolNews from '../../utils/getSchoolNews';
import getGradesByUserId from '../../utils/getGradesByUserId';

import './styles.scss';


const HomePageStudent = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user)
  const { schoolNews } = useSelector((state) => state)
  const { gradesUser } = useSelector((state) => state)
  useEffect(() => { getSchoolNews(currentUser.schools[0].id) }, []);
  useEffect(() => { getGradesByUserId(currentUser.id) }, []);

  //currentUser.classrooms.map(classe => { useEffect(() => { getClassById(classe.id) }, []); })

  const DetailsNote = gradesUser.map((oneGrade, i) => {
    return (
      <tr key={oneGrade.id}>
        <th scope="row">{i + 1}</th>
        <td>{oneGrade.title}</td>
        <td>{oneGrade.grade}</td>
        <td>{oneGrade.content}</td>
      </tr>
    )
  })

  const NewsSchoolConnected = schoolNews.map(schoolnew => {
    const DateComment = new Date(schoolnew.date);
    return (
      <div key={schoolnew.id} className="one_news_card_container">
        <div className="one_news_card_head">
          <img className="img_one_news" src="https://cap.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fcap.2F2020.2F04.2F14.2Fcc9a7052-4132-4ac9-9bd5-2d8bf381e784.2Ejpeg/750x375/background-color/ffffff/quality/70/retour-a-lecole-le-11-mai-le-gouvernement-est-alle-contre-lavis-du-conseil-scientifique-1368448.jpg"></img>
          <h3>{schoolnew.title}</h3>
        </div>
        <hr className="one_news_card_hr"></hr >
        <div className="one_news_card_body">
          <p>{schoolnew.content}</p>
          <div className="newsDateConnected">
            <p className="spanGrey">Posté le: {DateComment.toLocaleString(undefined)}</p>
          </div>
        </div>
      </div>
    )
  })


  return (
    <div className="container">
      <div className="container--homeStudent">
        <h1>Bienvenue {currentUser.firstname}</h1>
        <div className="container--homeStudent--news">
          <h2>
            Dernières infos de l'établissement
          </h2>
          <div className="news_card_container">
            {NewsSchoolConnected.slice(0, 2)}
          </div>
          <div className="go_all_news">
            <p onClick={() => history.push("/news")}
            >Lire les <span className="badge badge-primary">{schoolNews.length}</span> articles suivants...
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
              {/* <h3>Emploi du temps</h3> */}
              <img src="https://charivari.edumoov.com/wp-content/uploads/2018/03/Emploidu-temps-2.png"></img>
            </div>

            <div className="container--homeStudent--info--content--perso">
              <div className="container--homeStudent--info--content--perso--head">

                <img src="https://www.nicepng.com/png/detail/804-8049853_med-boukrima-specialist-webmaster-php-e-commerce-web.png"></img>
                <h5><span className="titlecardInfo">Elève: </span>{currentUser.lastname}</h5>

              </div>
              <hr></hr>
              <div className="container--homeStudent--info--content--perso--body">
                <p><span className="titlecardInfo">Email:</span> {currentUser.email}</p>


                <p><span className="titlecardInfo">Role:</span> {(currentUser.roles[0] === "ROLE_STUDENT") ? "Elève" : "Professeur"}</p>
                <p><span className="titlecardInfo">Etablissement:</span> {currentUser.schools[0].name}</p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}



export default HomePageStudent;

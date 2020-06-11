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

  console.log('Mes notes:', gradesUser)
  //currentUser.classrooms.map(classe => { useEffect(() => { getClassById(classe.id) }, []); })

  const DetailsNote = gradesUser.map((oneGrade, i) => {
    return (
      <tr key={oneGrade.id}>
        <th scope="row">{i + 1}</th>
        <td>{oneGrade.title}</td>
        <td>x</td>
        <td>{oneGrade.grade}</td>
        <td>{oneGrade.content}</td>

      </tr>
    )
  })

  const NewsSchoolConnected = schoolNews.map(schoolnew => {
    const DateComment = new Date(schoolnew.date);
    return (
      <div key={schoolnew.id} className="container--homeStudent--new--card">
        <h4>{schoolnew.title}</h4>
        <p>{schoolnew.content}</p>
        <p>Posté le: {DateComment.toLocaleString(undefined)}</p>
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
              {/* <span className="badge badge-primary ml-2">
                {schoolNews.length}
              </span> */}
          </h2>
          <div className="container--homeStudent--new">
            {NewsSchoolConnected.slice(0, 2)}
          </div>
          <button
            type="button"
            className="btn btn-primary"
            onClick={() => history.push("/news")}
          >Toutes les news de l'établissement <span className="badge badge-light"> {schoolNews.length}</span>
          </button>
        </div>
        <div className="container--homeStudent--classes">
          <h2>
            Dernières notes
              <span className="badge badge-primary ml-2">
              {gradesUser.length}
            </span>
          </h2>
          <div className="container--homeStudent--classes-tableau">
            <table className="table">
              <thead className="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titre devoir</th>
                  <th scope="col">Prof</th>
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
              <img src="https://charivari.edumoov.com/wp-content/uploads/2018/03/Emploidu-temps-2.png"></img>
            </div>

            <div className="container--homeStudent--info--content--perso">
              <div className="container--homeStudent--info--content--perso--head">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"></img>
                <h5>Elève: {currentUser.lastname}</h5>
              </div>
              <hr></hr>
              <div className="container--homeStudent--info--content--perso--body">
                <p>Email: {currentUser.email}</p>

                <p>Role: {(currentUser.roles[0] === "ROLE_STUDENT") ? "Elève" : "Professeur"}</p>
                <p>Etablissement: {currentUser.schools[0].name}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}



export default HomePageStudent;
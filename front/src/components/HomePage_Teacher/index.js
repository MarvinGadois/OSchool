import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useHistory } from 'react-router';
//import imageFolders from '../../../../back/public/assets/images';

import getSchoolNews from '../../utils/getSchoolNews';
import getClassById from '../../utils/getClassroomById';

import './styles.scss';

const HomePageTeacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user)
  const { schoolNews } = useSelector((state) => state)
  const { classrooms } = useSelector((state) => state)

  useEffect(() => { getSchoolNews(currentUser.schools[0].id) }, []);

  currentUser.classrooms.map(classe => { useEffect(() => { classrooms != '' ? null : getClassById(classe.id) }, []); })

  const DetailsClass = classrooms.map((oneClass, i) => {
    const NbStudentClasse = oneClass.users.filter(user => {
      return user.roles[0] === "ROLE_STUDENT"
    })

    return (
      <tr key={oneClass.id}>
        <th scope="row">{i + 1}</th>
        <td><i onClick={() => history.push(`/professeur/classe/${oneClass.id}`)} className="fa fa-eye mr-3 teacher_i" aria-hidden="true"></i>{oneClass.name}</td>
        <td>{NbStudentClasse.length}</td>
        <td>{oneClass.level}</td>
        <td>{oneClass.school.name}</td>

      </tr>
    )
  })

  const NewsSchoolConnected = schoolNews.map(schoolnew => {
    const DateComment = new Date(schoolnew.date);
    return (
      <div key={schoolnew.id} className="container--homeTeacher--new--card">
        <h4>{schoolnew.title}</h4>
        <p>{schoolnew.content}</p>
        <p>Posté le: {DateComment.toLocaleString(undefined)}</p>
      </div>
    )
  })


  return (
    <div className="container">
      <div className="container--homeTeacher">
        <h1>Bienvenue {currentUser.firstname}</h1>
        <div className="container--homeTeacher--news">
          <h2>
            Dernières infos de l'établissement
              {/* <span className="badge badge-primary ml-2">
              {schoolNews.length}
            </span> */}
          </h2>
          <div className="container--homeTeacher--new">
            {NewsSchoolConnected.slice(0, 2)}
          </div>

          <button
            type="button"
            className="btn btn-primary"
            onClick={() => history.push("/news")}
          >Toutes les news de l'établissement <span className="badge badge-light"> {schoolNews.length}</span>
          </button>
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
                <h5>Professeur {currentUser.lastname}</h5>
              </div>
              <hr></hr>
              <div className="container--homeTeacher--info--content--perso--body">
                <p>Email: {currentUser.email}</p>

                <p>Rôle: {(currentUser.roles[0] === "ROLE_STUDENT") ? "Élève" : "Professeur"}</p>

                {/* <p>Role: {currentUser.roles[0].slice(5).toLowerCase()}</p> */}
                <p>Établissement: {currentUser.schools[0].name}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HomePageTeacher;

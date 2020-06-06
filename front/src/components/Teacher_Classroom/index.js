import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';

//import imageFolders from '../../../../back/public/assets/images';


import getSchoolNews from '../../utils/getSchoolNews';
import './style.scss';

const TeacherClassroom = () => {
  const currentUser = useSelector((state) => state.user.user);
  const { classrooms } = useSelector((state) => state);
  console.log('les classes:', classrooms);
  // const membersList = classrooms.user.map(oneUser => {
  



  //console.log("salut c'est aymeric");



  // return of the comosant to the page
  return (
    <div className="wrapper">
      <div className="container-head">
        <h2>{currentUser.schools[0].name}</h2>

        <h2>Nombre d'élèves 20</h2>
        <div className="container-head--placeholder">
          <input type="text" className=""/>
        </div>
      </div>

      <h1>Votre classe</h1>
      <div className="container">
        <div className="classroomInfo">
          <h2>Information de la classe</h2>
          <div className="bordered">
            <ul>
              <li>Nombre d'élèves</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
              <img src="" alt="Emploi du temps" />
            </ul>
          </div>
        </div>

        <div className="membersList">
          <h2>Liste des membres</h2>
          <ul>
            <li>
              <p>student</p>
              <p>moyenne</p>
            </li>
          </ul>
        </div>

        <div className="subject">
          <h2>liste des matières</h2>
          <ul>
            <li>
              <p>matière</p>
              <p>professeur</p>
            </li>
          </ul>
        </div>

        <div className="lessons">
          <h2>Vos cours/lessons</h2>
          <div className="cards">
            <p>Nom de la matière</p>
            <p>Nom du cours</p>

          </div>
        </div>

        <div className="homework">
          <h2>Vos devoirs</h2>
          <div className="cards">
            <p>Nom du deovir</p>
            <p>Nom de la matière</p>

          </div>
        </div>


        <div className="correction">
          <h2>Vos corrections</h2>
          <div className="cards">
            <p>Nom du devoir</p>
            <p>Nom de la matière</p>

          </div>
        </div>
      </div>
    </div>
  );
};

export default TeacherClassroom;

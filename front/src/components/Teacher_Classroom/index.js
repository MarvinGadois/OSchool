import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";

import getLessons from "../../utils/getLessons";
import getHomeworks from "../../utils/getHomeworks";
import getClassById from '../../utils/getClassroomById';
import getCurrentClassById from "../../utils/getCurrentClassroom";
import "./style.scss";

const TeacherClassroom = () => {
  let { id } = useParams();
  const currentUser = useSelector((state) => state.user.user);
  const { currentClass } = useSelector((state) => state);
  const { lessons } = useSelector((state) => state);
  const { classrooms } = useSelector((state) => state);
  useEffect(() => {
    getLessons(currentUser.id);
  }, []);

  const { homeworks } = useSelector((state) => state);
  useEffect(() => {
    getHomeworks(currentUser.id);
  }, []);

  let allMembers;
  let currentClassUserNb;
  useEffect(() => {
    getCurrentClassById(id);
  }, []);

  currentClass.users
    ? (currentClassUserNb = currentClass.users.filter(
        (user) => user.roles[0] === "ROLE_STUDENT"
      ))
    : null;


  const LessonSubject = lessons.map((lesson) => (
    <p key={lesson.id}>
      {lesson.subject.title}
    </p>
  ));

  const LessonTitle = lessons.map((lesson) => (
    <div key={lesson.id}>
      <h4>{lesson.subject.title}</h4>
      <p>{lesson.title.slice(0, 10)}</p>
    </div>
  ));

  currentClass.users
    ? (allMembers = currentClass.users.map(
      (user) => (
        <div key={user.id}>
        <p>
          {user.lastname} {user.firstname} 
        </p>
        <p>moyenne 15/20</p>
        </div>
      )))
    : null;

    const allHomeworks = homeworks.map((homework) => (
      <div key={homework.id}>
        <p>{homework.title}</p>
        <p>{homework.code}</p>
      </div>
    ));



  // return of the comosant to the page
  return (
    <div className="wrappered">
      <div className="container-of-head">
        <h2>{currentUser.schools[0].name}</h2>
        Nombre d'élèves:
        {currentClass.users ? currentClassUserNb.length : null}
        <div className="container-head--placeholder">
          <input type="text" className="" />
        </div>
      </div>
      <div className="title-of-page">
        <h1>Votre classe</h1>
      </div>
      <div className="containered">
        <div className="classroomInfo">
          <h2>Information de la classe</h2>
          <div className="bordered">
            <ul>
              <li>{currentUser.classrooms[0].name}</li>
              <li>{currentUser.classrooms[0].level}</li>
              <img
                id="planning"
                src="https://i.pinimg.com/originals/a5/fb/2a/a5fb2ac484185792e81fa9fb2d2313b1.png"
                alt="Emploie du temps"
              ></img>
            </ul>
          </div>
        </div>

        <div className="membersList">
          <h2>Liste des membres</h2>
          <ul>
            <li>{allMembers}</li>
          </ul>
        </div>

        <div className="subject">
          <h2>liste des matières</h2>
          <ul>
            <li>
              {LessonSubject}
              <p>professeur</p>
              <p>one lesson</p>
            </li>
          </ul>
        </div>

        <div className="lessons">
          <h2>Vos cours/lessons</h2>
          <div className="cards">{LessonTitle}</div>
        </div>

        <div className="homework">
          <h2>Vos devoirs</h2>
          <div className="cards">{allHomeworks}</div>
        </div>

        <div className="correction">
          <h2>Vos corrections</h2>
          <div className="cards">
            <p>Aucun devoir corrigé</p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default TeacherClassroom;

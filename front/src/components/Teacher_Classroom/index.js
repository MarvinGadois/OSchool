import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";

import getLessons from "../../utils/getLessons";
import getHomeworks from "../../utils/getHomeworks";
import getCurrentClassById from "../../utils/getCurrentClassroom";
import "./style.scss";

const TeacherClassroom = () => {

  let { id } = useParams();

  // the current user connected
  const currentUser = useSelector((state) => state.user.user);

  // the current class of the user connected
  const { currentClass } = useSelector((state) => state);

  // console.log(currentUser.schools[0].name);
  // console.log(currentClass);
  // console.log(currentClass.school);

  // get the lessons of a user
  const { lessons } = useSelector((state) => state);
  useEffect(() => {
    getLessons(currentUser.id);
  }, []);

  // get the homework of a user
  const { homeworks } = useSelector((state) => state);
  useEffect(() => {
    getHomeworks(currentUser.id);
  }, []);

 
  // get the students in the class 
  
  useEffect(() => {
    getCurrentClassById(id);
  }, []);

  // get uset with students role
  let currentStudent;
  currentClass.users
    ? (currentStudent = currentClass.users.filter(
      (user) => user.roles[0] === "ROLE_STUDENT"
    ))
    : null;

  let allStudentCard;
  if (currentClass.users) {
    allStudentCard = currentStudent.map((student) => (

      <div key={student.id} className="memberCard">
        {student.lastname} {student.firstname}
        <p className="average">Moyenne : 15/20</p>
      </div>

    ));
  }

  // get the subjects of the current class
  let classroomSubject;
  if (currentClass.users) {
    console.log("ok");
    classroomSubject = currentClass.users.map((user) => (

        user.subjects.map((subject) => (
          <p key={user.id}>
            {subject.title} - {user.lastname}  {user.firstname}
          </p>
        ))
    ));
  } else {
    console.log("nop");
  }

  const allLessonCard = lessons.map((lesson) => (

    <div key={lesson.id} className="memberCard">
      <p>{lesson.title}</p>
      <p>{lesson.content}</p>
      <p>{lesson.path}</p>
    </div>
  ));

  // get all members and their overall average
  let allMembers;
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

  // get the last homework of the current user
  const allHomeworks = homeworks.map((homework) => (
    <div key={homework.id}>
      <p>{homework.title}</p>
      <p>{homework.code}</p>
    </div>
  ));



  // return of the comosant to the page
  return (
    <div className="wrappered">
      <div className="title-of-page">
        <h1>Votre classe : {currentClass.name}</h1>
      </div>
      <div className="containered">

        <div className="classroomInfo">
          <h2>Information de {currentClass.name}</h2>
          <div>
            <ul>
              <li><span>Niveau : </span>{currentClass.level}</li>
              <li><span>Nombre d'élèves : </span>{currentClass.users ? currentStudent.length : null}</li>
              <li><span>Moyenne de la classe : </span>11/20</li>
            </ul><br/>
            
            <ul>
                <li><span>Matières :</span></li><br/>
                {classroomSubject}
            </ul>
          </div>
          
          <img
              id="planning"
              src="https://ahogwartsstudent.files.wordpress.com/2017/11/hogwarts-timetable1.jpg"
              alt="Emploi du temps"
            ></img>
        </div>

        <div className="membersList">
          <h2><a href={"/cours"}>Liste des membres</a></h2>
          <div className="cards-group">
            {allStudentCard}
          </div>
          
          
        </div>

        {/* <div className="subject">
          <h2>liste des matières</h2>
          <ul>
            <li>
              {classroomSubject}
            </li>
          </ul>
        </div> */}

        <div className="lessons">
          <h2>Vos cours</h2>
          <div className="cards-group">
            {allLessonCard}
          </div>
        </div>

        <div className="homework">
          <h2>Vos devoirs</h2>
          <div className="cards">{allHomeworks}</div>
        </div>

        {/* <div className="correction">
          <h2>Vos corrections</h2>
          <div className="cards">
            <p>Aucun devoir corrigé</p>
          </div>
        </div> */}

      </div>
    </div>
  );
};

export default TeacherClassroom;

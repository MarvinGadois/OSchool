import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./lessonsStudent.scss";

import getLessonsByClassroom from "../../utils/getLessonsByClassroom";

const Lessons_Student = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { lessons_by_classroom } = useSelector((state) => state);
  useEffect(() => {
    getLessonsByClassroom(currentUser.classrooms[0].id);
  }, []);

  const mapLesson = (lessonClass) => (
    <div
      key={lessonClass.id}
      className="card border-dark m-4"
      style={{ textAlign: "center" }}
    >
      <div
        className="card-header"
        style={{ fontWeight: "bold" }}
      >
        Matière: {lessonClass.subject.title}
      </div>
      <div className="card-body text-dark">
        <h2 className="card-title">{lessonClass.title}</h2>
        <p className="card-text p-3 m-2">{lessonClass.content}</p>
      </div>
      <div className="card-footer">
        <p
          onClick={() => history.push(`/cours/${lessonClass.id}`)}
          className="badge badge-danger"
          style={{ backgroundColor: "#335C81", fontSize: "15px" }}
          type="button"
        >
          Accéder ici
        </p>
      </div>
    </div>
  );

  const allLessonsByClass =
    lessons_by_classroom && lessons_by_classroom.length ? (
      lessons_by_classroom.map(mapLesson)
    ) : (
      <div>Pas de cours</div>
    );

  return (
    <div className="container">
      <div className="btn-group dropleft">
        <button
          type="button"
          className="btn btn-secondary dropdown-toggle m-4"
          style={{ backgroundColor: "#335C81" }}
          onClick={() => history.push(`/`)}
        >
          Revenir à l'accueil
        </button>
      </div>
      <div className="">
        {allLessonsByClass}
      </div>
    </div>
  );
};

export default Lessons_Student;

import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./lessonsTeacher.scss";

import getLessons from "../../utils/getLessons";

const Lessons_Teacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { lessons } = useSelector((state) => state);
  useEffect(() => {
    getLessons(currentUser.id);
  }, []);


  const mapLessonsTeacher = (lesson) => (
    <div 
      key={lesson.id} 
      className="card border-dark" 
      style={{ margin: "5px" }}
    >
      <div className="card-header">
        Matière du cours: {lesson.subject.title}
      </div>
      <div className="card-body text-dark">
        <h2 className="card-title">{lesson.title}</h2>
        <p className="card-text">{lesson.content}</p>
      </div>
      <div className="card-footer">
        <p
          className="link_to_lesson"
          onClick={() => history.push(`/coursprof/${lesson.id}`)}
          className="badge badge-danger"
        >
          Accéder ici
        </p>
      </div>
    </div>
  );

    const allLessonsByTeacher =
      lessons && lessons.length ? (
        lessons.map(mapLessonsTeacher)
      ) : (
        <div>Pas de cours</div>
      );

  return (
    <div className="container">
      <div className="btn-group dropleft">
        <button
          type="button"
          className="btn btn-secondary dropdown-toggle"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          style={{ margin: "5px" }}
          onClick={() => history.push(`/`)}
        >
          Revenir à l'accueil
        </button>
      </div>
      <div className="">
        {allLessonsByTeacher}
      </div>
    </div>
  );
};

export default Lessons_Teacher;

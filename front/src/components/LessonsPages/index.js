import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./lessonsPages.scss";

import getLessons from "../../utils/getLessons";

const LessonsPages = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { lessons } = useSelector((state) => state);
  useEffect(() => {
    getLessons(currentUser.id);
  }, []);

  console.log(lessons);

  const allLessons = lessons.map((lesson) => (
    <div
      key={lesson.id}
      className="card border-success mb-3 card text-white bg-warning"
      style={{ maxWidth: "25rem" }}
    >
      <div className="card-header bg-transparent border-success">
        Cours de {lesson.subject.title}
      </div>
      <div className="card-body text-success">
        <h2 className="card-title">Titre du cours: {lesson.title}</h2>
        <p className="card-text">{lesson.content}</p>
      </div>
      <div className="card-footer bg-transparent border-success">
        <p
          className="link_to_lesson"
          onClick={() => history.push(`/cours/${lesson.id}`)}
          className="badge badge-danger"
        >
          Accéder ici
        </p>
      </div>
    </div>
  ));

  return (
    <div className="container_lessons">
      <div className="dropdown">
        <button
          className="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Voir Catégories
        </button>
        <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a className="dropdown-item" href="#">
            Notes
          </a>
          <a className="dropdown-item" href="#">
            Devoirs
          </a>
          <a className="dropdown-item" href="#">
            Cours
          </a>
        </div>
      </div>
      <div className="container-fluid d-flex flex-row flex-wrap justify-content-around">
        {allLessons}
      </div>
    </div>
  );
};

export default LessonsPages;

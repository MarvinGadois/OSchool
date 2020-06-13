import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";
import { useHistory } from "react-router";

// Import scss
import "./lesson.scss";

import getOneLessonById from "../../utils/getOneLessonById";

const OneLesson = () => {
  const history = useHistory();
  let { idLesson } = useParams();
  console.log(idLesson);
  const { lesson } = useSelector((state) => state);
  useEffect(() => {
    getOneLessonById(idLesson);
  }, []);

  console.log(lesson);

  return (
    <div className="container_lesson">
      <div className="btn-group dropleft">
        <button
          type="button"
          className="btn btn-secondary dropdown-toggle"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          style={{ margin: "5px" }}
          onClick={() => history.push(`/cours`)}
        >
          Revenir aux cours
        </button>
      </div>
      <div
        className="card text-white bg-success mb-3 container fluid"
        style={{ maxWidth: "25rem" }}
      >
        <div className="card-header">{lesson.title}</div>
        <div className="card-body">
          <h5 className="card-title">{lesson.content}</h5>
          <p className="card-text">Cours numero: {lesson.id}</p>
          <p className="card-footer">Lien: {lesson.path}</p>
        </div>
      </div>
    </div>
  );
};

export default OneLesson;

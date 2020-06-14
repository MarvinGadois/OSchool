import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";
import { useHistory } from "react-router";

// Import scss
import "./onelessonteacher.scss";

import getOneLessonById from "../../utils/getOneLessonById";

const OneLessonTeacher = () => {
  const history = useHistory();
  let { idLesson } = useParams();
  const { lesson } = useSelector((state) => state);
  useEffect(() => {
    getOneLessonById(idLesson);
  }, []);

  return (
    <div className="container" id="container-one-lesson">
      <div className="btn-group dropleft">
        <button
          type="button"
          className="btn btn-secondary dropdown-toggle m-4"
          onClick={() => history.push(`/coursprof`)}
          style={{ backgroundColor: "#335C81" }}
        >
          Revenir aux cours
        </button>
      </div>
      <div className="card borderdark m-4" style={{ textAlign: "center" }}>
        <div className="card-header" style={{ fontWeight: "bold" }}>
          {lesson.title}
        </div>
        <div className="card-body">
          <h5 className="card-title p-5">{lesson.content}</h5>
          <p className="card-text p-2">Cours numero: {lesson.id}</p>
          <p className="card-footer">Lien: {lesson.path}</p>
        </div>
      </div>
    </div>
  );
};

export default OneLessonTeacher;

import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";
import { useHistory } from "react-router";

// Import scss
import './lesson.scss';

import getOneLessonById from "../../utils/getOneLessonById";


const Lesson = () => {
  const history = useHistory();
let { idLesson } = useParams();
console.log(idLesson);
  const { lesson } = useSelector((state) => state);
  useEffect(() => {
    getOneLessonById(idLesson);
  }, []);

  console.log(lesson);

  return (
    <div className='container_lesson'>
      <div className="dropdown">
        <button
          className="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          onClick={() => history.push(`/cours`)}
        >
          Cliquer ici pour revenir aux cours
        </button>
      </div>
      <div
        className="card text-white bg-success mb-3 container fluid"
        style={{ maxWidth: "18rem" }}
      >
        <div className="card-header">{lesson.title}</div>
        <div className="card-body">
          <h5 className="card-title">{lesson.content}</h5>
          <p className="card-text">Cours numero: {lesson.id}</p>
        </div>
      </div>
    </div>
  );
};

export default Lesson;

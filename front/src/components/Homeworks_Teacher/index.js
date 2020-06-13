import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./homeworksTeacher.scss";

import getHomeworks from "../../utils/getHomeworks";

const Homeworks_Teacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { homeworks } = useSelector((state) => state);
  useEffect(() => {
    getHomeworks(currentUser.id);
  }, []);

  console.log(homeworks);
  // console.log("class", classrooms);

  const allHomeworks = homeworks.map((homework) => (
    <div
      key={homework.id}
      className="card border-dark"
      style={{ margin: "5px" }}
    >
      <div className="card-header">
        Devoirs de {homework.subject.title}
      </div>
      <div className="card-body text-dark">
        <h2 className="card-title">Classe {homework.classroom.name}</h2>
        <h2 className="card-title">{homework.title}</h2>
        <p className="card-text">{homework.content}</p>
      </div>
      <div className="card-footer">
        <p
          onClick={() => history.push(`/devoirsprof/${homework.id}`)}
          className="badge badge-danger"
        >
          Accéder ici
        </p>
      </div>
    </div>
  ));

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
        {allHomeworks}
      </div>
    </div>
  );
};

export default Homeworks_Teacher;

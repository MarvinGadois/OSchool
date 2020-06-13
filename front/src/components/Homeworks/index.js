import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./homeworks.scss";

import getHomeworksByClassroom from "../../utils/getHomeworksByClassroom";

const Homeworks = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { homeworks_by_classroom } = useSelector((state) => state);
    useEffect(() => {
      getHomeworksByClassroom(currentUser.classrooms[0].id);
    }, []);

const mapHomeworks = (homeworkClass) => (
  <div
    key={homeworkClass.id}
    className="card borderdark"
    style={{ margin: "5px" }}
  >
    <div className="card-header">
      Devoirs de {homeworkClass.subject.title}
    </div>
    <div className="card-body text-dark">
      <h2 className="card-title">Classe {homeworkClass.classroom.name}</h2>
      <h2 className="card-title">{homeworkClass.title}</h2>
      <p className="card-text">{homeworkClass.content}</p>
    </div>
    <div className="card-footer">
      <p
        onClick={() => history.push(`/devoirs/${homeworkClass.id}`)}
        className="badge badge-danger"
      >
        Accéder ici
      </p>
    </div>
  </div>
);




  const allHomeworksByClass =
    homeworks_by_classroom && homeworks_by_classroom.length ? (
      homeworks_by_classroom.map(mapHomeworks)
    ) : (
      <div>Pas de devoirs</div>
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
        {allHomeworksByClass}
      </div>
    </div>
  );
};

export default Homeworks;

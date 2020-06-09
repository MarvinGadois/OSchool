import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./homeworks.scss";

import getHomeworks from "../../utils/getHomeworks";

const Homeworks = () => {

  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { homeworks } = useSelector((state) => state);
  useEffect(() => {
    getHomeworks(currentUser.id);
  }, []);

  console.log(homeworks);


  const allHomeworks = homeworks.map((homework) => (
    <div
      key={homework.id}
      className="card border-success mb-3 card text-white bg-dark mb-3"
      style={{ maxWidth: "18rem" }}
    >
      <div className="card-header bg-transparent border-success">
        Cours de {homework.subject.title}
      </div>
      <div className="card-body text-success">
        <h2 className="card-title">
          Classe {homework.classroom.name}
        </h2>
        <h2 className="card-title">
          {homework.title}
        </h2>
        <p className="card-text">{homework.content}</p>
      </div>
      <div className="card-footer bg-transparent border-success">
        <p
          onClick={() => history.push(`/devoirs/${homework.id}`)}
          className="badge badge-danger"
        >
          Telecharger ici
        </p>
      </div>
    </div>
  ));

  
  return (
    <>
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
      <div className="container-fluid d-flex flex-row justify-content-around flex-wrap">
        {allHomeworks}
      </div>
    </>
  );
};

export default Homeworks;

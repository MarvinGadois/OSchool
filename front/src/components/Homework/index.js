import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";
import { useHistory } from "react-router";

// Import scss
import "./homework.scss";

import getOneHomeworkById from "../../utils/getOneHomeworkById";


const Homework = () => {
  const history = useHistory();
  let { id } = useParams();
  console.log(id);
  const { homework } = useSelector((state) => state);
  useEffect(() => {
    getOneHomeworkById(id);
  }, []);

  console.log(homework);

  return (
    <div className="container_homework">
      <div className="dropdown">
        <button
          className="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          onClick={() => history.push(`/devoirs`)}
        >
          Cliquer ici pour revenir aux devoirs
        </button>
      </div>
      <div
        className="card text-white bg-success mb-3 container fluid"
        style={{ maxWidth: "18rem" }}
      >
        <div className="card-header">{homework.title}</div>
        <div className="card-body">
          <h5 className="card-title">{homework.content}</h5>
          <p className="card-text">Lien du devoir: {homework.path}</p>
        </div>
      </div>
    </div>
  );
};

export default Homework;

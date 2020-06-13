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
  const { homework } = useSelector((state) => state);
  useEffect(() => {
    getOneHomeworkById(id);
  }, []);


  return (
    <div className="container" id="container-one-homework">
      <div className="btn-group dropleft">
        <button
          type="button"
          className="btn btn-secondary dropdown-toggle"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          style={{ margin: "5px" }}
          onClick={() => history.push(`/devoirs`)}
        >
          Revenir aux devoirs
        </button>
      </div>
      <div className="card borderdark" style={{ margin: "5px" , textAlign: "center" }}>
        <div className="card-header">{homework.title}</div>
        <div className="card-body">
          <p className="card-title p-5">{homework.content}</p>
          <p className="card-text p-2">Code {homework.code}</p>
          <p className="card-footer">
            Lien du devoir: {homework.path}
          </p>
        </div>
      </div>
    </div>
  );
};

export default Homework;

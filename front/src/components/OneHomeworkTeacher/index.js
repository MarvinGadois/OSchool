import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useParams } from "react-router";
import { useHistory } from "react-router";

// Import scss
import "./onehomeworkteacher.scss";

import getOneHomeworkById from "../../utils/getOneHomeworkById";

const OneHomeworkTeacher = () => {
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
          className="btn btn-secondary dropdown-toggle m-4"
          onClick={() => history.push(`/devoirsprof`)}
          style={{ backgroundColor: "#335C81" }}
        >
          Revenir aux devoirs
        </button>
      </div>
      <div
        className="card border-dark m-4"
        style={{ margin: "5px", textAlign: "center" }}
      >
        <div className="card-header" style={{ fontWeight: "bold" }}>
          {homework.title}
        </div>
        <div className="card-body">
          <p className="card-title p-5">{homework.content}</p>
          <p className="card-text p-2">Code {homework.code}</p>
          <p className="card-footer">Lien du devoir: {homework.path}</p>
        </div>
      </div>
    </div>
  );
};

export default OneHomeworkTeacher;

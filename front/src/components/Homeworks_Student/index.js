import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { useHistory } from "react-router";

// Import scss
import "./homeworksStudent.scss";

import getHomeworksByClassroom from "../../utils/getHomeworksByClassroom";

const Homeworks_Student = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { homeworks_by_classroom } = useSelector((state) => state);
    useEffect(() => {
      getHomeworksByClassroom(currentUser.classrooms[0].id);
    }, []);

const mapHomeworks = (homeworkClass) => (
  <div
    key={homeworkClass.id}
    className="card border-dark m-4"
    style={{ textAlign: "center" }}
  >
    <div className="card-header" style={{ fontWeight: "bold" }}>
      Matière: {homeworkClass.subject.title}
    </div>
    <div className="card-body text-dark">
      <h2 className="card-title">Classe {homeworkClass.classroom.name}</h2>
      <h2 className="card-title">{homeworkClass.title}</h2>
      <p className="card-text p-3 m-2">{homeworkClass.content}</p>
    </div>
    <div className="card-footer">
      <p
        onClick={() => history.push(`/devoirs/${homeworkClass.id}`)}
        className="badge badge-danger"
        style={{ backgroundColor: "#335C81", fontSize: "15px" }}
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
          className="btn btn-secondary dropdown-toggle m-4"
          style={{ backgroundColor: "#335C81" }}
          onClick={() => history.push(`/`)}
        >
          Revenir à l'accueil
        </button>
      </div>
      <div className="">{allHomeworksByClass}</div>
    </div>
  );
};

export default Homeworks_Student;

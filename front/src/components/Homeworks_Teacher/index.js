import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useHistory } from 'react-router';

// Import scss
import './homeworksTeacher.scss';

import getHomeworks from '../../utils/getHomeworks';

const Homeworks_Teacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { homeworks } = useSelector((state) => state);
  useEffect(() => {
    getHomeworks(currentUser.id);
  }, []);

  const allHomeworks = homeworks.map((homework) => (
    <div
      key={homework.id}
      className="card border-dark m-4"
      style={{ textAlign: 'center' }}
    >
      <div className="card-header" style={{ fontWeight: 'bold' }}>
        Matière: {homework.subject.title}
      </div>
      <div className="card-body text-dark">
        <h2 className="card-title">Classe {homework.classroom.name}</h2>
        <h2 className="card-title">{homework.title}</h2>
        <p className="card-text p-3 m-2">{homework.content}</p>
      </div>
      <div className="card-footer d-flex flex-row justify-content-around">
        <p
          onClick={() => history.push(`/devoirsprof/${homework.id}`)}
          className="badge badge-danger"
          style={{ backgroundColor: '#335C81', fontSize: '15px' }}
          type="button"
        >
          Accéder ici
        </p>
        <p
          className="badge badge-danger"
          style={{ backgroundColor: '#335C81', fontSize: '15px' }}
          type="button"
        >
          <a
            href={`http://ec2-54-152-201-144.compute-1.amazonaws.com/homework/user/${currentUser.id}/edit/${homework.id}`}
            style={{ color: 'white' }}
          >
            Modifier
          </a>
        </p>
      </div>
    </div>
  ));

  return (
    <div className="container">
      <div
        className="navlinks d-flex flex-row justify-content-between
"
      >
        <div className="btn-group dropleft">
          <button
            type="button"
            className="btn btn-secondary dropdown-toggle m-4"
            style={{ backgroundColor: "#335C81" }}
            onClick={() => history.push("/")}
          >
            Revenir à l'accueil
          </button>
        </div>
        <div className="btn-group dropright">
          <button
            type="button"
            className="btn btn-secondary dropdown-toggle m-4"
            style={{ backgroundColor: "#335C81", zIndex: "-1" }}
          >
            <a
              href={`http://ec2-54-152-201-144.compute-1.amazonaws.com/homework/user/${currentUser.id}/add`}
              style={{ color: "white" }}
            >
              Ajouter un devoir
            </a>
          </button>
        </div>
      </div>
      <div className="">{allHomeworks}</div>
    </div>
  );
};

export default Homeworks_Teacher;

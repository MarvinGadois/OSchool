import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useHistory } from 'react-router';

// Import scss
import './lessonsTeacher.scss';

import getLessons from '../../utils/getLessons';

const Lessons_Teacher = () => {
  const history = useHistory();
  const currentUser = useSelector((state) => state.user.user);
  const { lessons } = useSelector((state) => state);
  useEffect(() => {
    getLessons(currentUser.id);
  }, []);

  const mapLessonsTeacher = (lesson) => (
    <div
      key={lesson.id}
      className="card border-dark m-4"
      style={{ textAlign: 'center' }}
    >
      <div className="card-header" style={{ fontWeight: 'bold' }}>
        Matière: {lesson.subject.title}
      </div>
      <div className="card-body text-dark">
        <h2 className="card-title">{lesson.title}</h2>
        <p className="card-text p-3 m-2">{lesson.content}</p>
      </div>
      <div className="card-footer d-flex flex-row justify-content-around">
        <p
          onClick={() => history.push(`/coursprof/${lesson.id}`)}
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
            href={`http://ec2-54-152-201-144.compute-1.amazonaws.com/lesson/user/${currentUser.id}/edit/${lesson.id}`}
            style={{ color: 'white' }}
          >
            Modifier
          </a>
        </p>
      </div>
    </div>
  );

  const allLessonsByTeacher =
    lessons && lessons.length ? (
      lessons.map(mapLessonsTeacher)
    ) : (
      <div>Pas de cours</div>
    );

  return (
    <div className="container">
      <div className="navlinks d-flex flex-row justify-content-between">
        <div className="btn-group dropleft">
          <button
            type="button"
            className="btn btn-secondary dropdown-toggle m-4"
            style={{ backgroundColor: '#335C81' }}
            onClick={() => history.push('/')}
          >
            Revenir à l'accueil
          </button>
        </div>
        <div className="btn-group dropright">
          <button
            type="button"
            className="btn btn-secondary dropdown-toggle m-4"
            style={{ backgroundColor: '#335C81' }}
          >
            <a
              href={`http://ec2-54-152-201-144.compute-1.amazonaws.com/lesson/user/${currentUser.id}/add`}
              style={{ color: 'white' }}
            >
              Ajouter une leçon
            </a>
          </button>
        </div>
      </div>
      <div className="">{allLessonsByTeacher}</div>
    </div>
  );
};

export default Lessons_Teacher;

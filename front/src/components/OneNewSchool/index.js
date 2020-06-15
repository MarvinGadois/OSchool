import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useParams } from "react-router";
import { useHistory } from "react-router";

import getOneNewById from '../../utils/getOneNewById';


import './styles.scss';

const OneNewSchool = () => {
    const history = useHistory();
    let { id } = useParams();
    const { OneNewById } = useSelector((state) => state);

    useEffect(() => { getOneNewById(id) }, []);

    const DateComment3 = new Date(OneNewById.date);
    return (
        <div className="fixonenew">
              <div className="btn-group dropleft">
                <button
                  type="button"
                  className="btn btn-secondary dropdown-toggle m-4"
                  onClick={() => history.push(`/news`)}
                  style={{ backgroundColor: "#335C81" }}
                >
                  Revenir aux news
                </button>
              </div>
            <div className="container-one-new">
                <h2>{OneNewById.title}</h2>
                <p className="one-new-content">{OneNewById.content}</p>
                <div className="dateNews2">
                    <p className="spanGrey">Posté le: {DateComment3.toLocaleString(undefined)}</p>
                </div>
            </div>
        </div>
    );
};



export default OneNewSchool;

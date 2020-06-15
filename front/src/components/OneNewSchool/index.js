import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useParams } from "react-router";

import getOneNewById from '../../utils/getOneNewById';


import './styles.scss';

const OneNewSchool = () => {
    let { id } = useParams();
    const { OneNewById } = useSelector((state) => state);

    useEffect(() => { getOneNewById(id) }, []);

    const DateComment3 = new Date(OneNewById.date);
    return (
        <div className="fixonenew">
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
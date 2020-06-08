import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useHistory } from 'react-router';

import getSchoolNews from '../../utils/getSchoolNews';

import './styles.scss';

const AllNewsSchool = () => {
    const history = useHistory();
    const currentUser = useSelector((state) => state.user.user);
    const { schoolNews } = useSelector((state) => state);

    useEffect(() => { getSchoolNews(currentUser.schools[0].id) }, []);

    const AllNewsSchoolConnected = schoolNews.map(schoolnew => {
        const DateComment2 = new Date(schoolnew.date);
        return (
            <div onClick={() => history.push(`/new/${schoolnew.id}`)} key={schoolnew.id} className="container-One-News">
                <h2>{schoolnew.title}</h2>
                <p>{schoolnew.content}</p>
                <div className="dateNews">
                    <p className="spanGrey">Posté le: {DateComment2.toLocaleString(undefined)}</p>
                </div>
                <hr></hr>
            </div>
        )
    })

    return (
        <div className="container-AllSchollNews">
            <h1>Les news de l'établissement<span className="badge badge-primary ml-3">{schoolNews.length}</span></h1>
            <div className="container-All-News">
                {AllNewsSchoolConnected}
            </div>
        </div>
    );
};

export default React.memo(AllNewsSchool);

import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';


import getNews from '../../utils/getNews';

import './styles.scss';


const HomePageTeacher = () => {
    const { news } = useSelector((state) => state)
    useEffect(getNews, []);
    console.log(news);
    return (
        <div className=".container--homeTeacher">
            <h1>Bienvenue firstname</h1>
            <div className="container--homeTeacher--info">
                <div className="container--homeTeacher--news">
                    news ecole
               </div>
                <div className="container--homeTeacher--stickyNote">
                    news ecole
               </div>
            </div>
            <div className="container--homeTeacher--classes">
                <p>ici toutes les classes teacher</p>
            </div>
            <div className="container--homeTeacher--homework">
                <p>ici toutes les homeworks teacher</p>
            </div>
        </div>
    )
}

export default HomePageTeacher;
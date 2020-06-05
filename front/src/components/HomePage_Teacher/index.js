import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';

//import imageFolders from '../../../../back/public/assets/images';


import getSchoolNews from '../../utils/getSchoolNews';

import './styles.scss';


const HomePageTeacher = () => {
    const currentUser = useSelector((state) => state.user.user)
    const { schoolNews } = useSelector((state) => state)
    useEffect(() => {
        getSchoolNews(currentUser.schools[0].id);
    }, [])

    const allclasses = currentUser.classrooms.map(classe => {
        return (
            <tr key={classe.id}>
                <th scope="row">1</th>
                <td>{classe.name}</td>
                <td>28</td>
                <td>{classe.level}</td>
                <td>{currentUser.schools[0].name}</td>

            </tr>
        )
    })

    const NewsSchoolConnected = schoolNews.map(schoolnew => {
        return (
            <div key={schoolnew.id} className="container--homeTeacher--new--card">
                <h4>{schoolnew.title}</h4>
                <p>{schoolnew.content}</p>
                <p>{schoolnew.date}</p>
            </div>
        )
    })

    console.log(schoolNews)

    return (
        <div className="container">
            <div className="container--homeTeacher">
                <h1>Bienvenue {currentUser.firstname}</h1>
                <div className="container--homeTeacher--news">
                    <h2>Dernières infos de l'établissement</h2>
                    <div className="container--homeTeacher--new">
                        {NewsSchoolConnected.slice(0, 2)}
                    </div>
                </div>
                <div className="container--homeTeacher--classes">
                    <h2>Vos classes</h2>
                    <div className="container--homeTeacher--classes-tableau">
                        <table className="table">
                            <thead className="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom classe</th>
                                    <th scope="col">Nb élèves</th>
                                    <th scope="col">Niveau</th>
                                    <th scope="col">Etablissement</th>
                                </tr>
                            </thead>
                            <tbody>
                                {allclasses}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div className="container--homeTeacher--info">
                    <h2>Informations</h2>
                    <div className="container--homeTeacher--info--content">
                        <div className="container--homeTeacher--info--content--shedule">
                            <h3>Emploi du temps</h3>
                            <img src="https://i.pinimg.com/originals/a5/fb/2a/a5fb2ac484185792e81fa9fb2d2313b1.png"></img>
                        </div>

                        <div className="container--homeTeacher--info--content--perso">
                            <div className="container--homeTeacher--info--content--perso--head">
                                <img src='https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png'></img>
                                <h5>Professeur {currentUser.lastname}</h5>
                            </div>
                            <hr></hr>
                            <div className="container--homeTeacher--info--content--perso--body">
                                <p>Email: {currentUser.email}</p>
                                <p>Role: {currentUser.roles[0].slice(5).toLowerCase()}</p>
                                <p>Etablissement: {currentUser.schools[0].name}</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    )
}

export default HomePageTeacher;
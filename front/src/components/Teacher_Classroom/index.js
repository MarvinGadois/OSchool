import React, { useEffect } from 'react';
import { useSelector } from 'react-redux';

//import imageFolders from '../../../../back/public/assets/images';


import getSchoolNews from '../../utils/getSchoolNews';

// import './styles.scss';


const TeacherClassroom = () => {
    const currentUser = useSelector((state) => state.user.user)
    const currentClass = useSelector((state) => state.user.currentClass) //we need it for the display of the entire page since it's about the class itself
    // useEffect(() => {
    //     getSchoolNews(currentUser.schools[0].id);
    // }, [])

    // const currentClass = currentUser.classrooms.map(classe => {
    //     return (
    //         <tr key={classe.id}>
    //             <th scope="row">1</th>
    //             <td>{classe.name}</td>
    //             <td>28</td>
    //             <td>{classe.level}</td>
    //             <td>{currentUser.schools[0].name}</td>

    //         </tr>
    //     )
    // })


    console.log("salut c'est aymeric")

    //return of the comosant to the page
    return (
      <div className="wrapper">
          <div>

            <p>{currentUser.schools[0].name}</p>

            <p></p>

          </div>

      </div>
    )
    
}

export default TeacherClassroom;

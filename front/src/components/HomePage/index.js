import React from 'react';
import { useDispatch, useSelector } from 'react-redux';


// Import style
import './style.css';

// Import components
import Description from './Description';
import LastNews from './LastNews';
import Opinion from './opinion';
import HomePageStudent from '../HomePage_Student';
import HomePageTeacher from '../HomePage_Teacher';



const HomePage = () => {

    const isAuthentified = useSelector((state) => state.connected);
    const roleUser = useSelector((state) => state.user.roles);



    if (isAuthentified) {

        if (roleUser[0] === 'ROLE_STUDENT') {
            return (
                <div className="homePage">
                    <HomePageStudent />
                </div>
            )
        } else if (roleUser[0] === 'ROLE_TEACHER') {
            return (
                <div className="homePage">
                    <HomePageTeacher />
                </div>
            )
        }
    }
    console.log('authentifié:' + isAuthentified)



    return (
        <div className="homePage">
            <div className="homePage_content">
                <Description />
                <LastNews />
            </div>
            <Opinion />
        </div>
    )

};





export default HomePage;

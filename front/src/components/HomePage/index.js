import React from 'react';

// import style
import './style.css';

//import components
import Description from './Description';
import LastNews from './LastNews';
import Opinion from './Opinion';


const HomePage = () => {
    const userToken = JSON.parse(localStorage.getItem('userToken'));

    if (!userToken) {
        return (
            <div className="homePage">
                <div className="homePage_content">
                    <Description />
                    <LastNews />
                </div>
                <Opinion />
            </div>
        )
    }
    return (
        <div className="homePage">
            HomePage Connected
        </div>
    )

};

export default HomePage;

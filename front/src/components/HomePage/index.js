import React from 'react';

// import style
import './style.css';

//import components
import Description from './Description';
import LastNews from './LastNews';


const HomePage = () => {
    return (
        <div className="homePage">
            <Description />
            <LastNews />
        </div>
    );
};

export default HomePage;

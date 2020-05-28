import React from 'react';

// import style
import './style.css';

//import components
import Description from './Description';
import LastNews from './LastNews';
import Opinion from './opinion';


const HomePage = () => {
    return (
        <div className="homePage">
            <div className="homePage_content">
                <Description />
                <LastNews />
            </div>
            <Opinion />
        </div>

    );
};

export default HomePage;

import React from 'react';
import { useDispatch, useSelector } from 'react-redux';


// Import style
import './style.css';

// Import components
import Description from './Description';
import LastNews from './LastNews';
import Opinion from './opinion';



const HomePage = () => {

    const isAuthentified = useSelector((state) => state.connected);
    console.log('authentifié:' + isAuthentified)

    if (!isAuthentified) {
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
            home page connected
        </div>
    )
};

export default HomePage;

import React from 'react';
import { useHistory } from 'react-router';
import Logo from "src/assets/O'school.png";

import './styles.scss';


const Page404 = () => {
    const history = useHistory();
    return (
        <div className="container_404">
            <img onClick={() => history.push('/')} src={Logo}></img>
            <h1>404</h1>
            <p>Oops, il n'y a rien ici ;-(</p>
        </div>
    );
};

export default Page404;
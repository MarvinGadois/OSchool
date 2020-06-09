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
            <h2>Oops, il n'y a rien ici ;-(</h2>
            {/* <p>La page que vous cherchez n'hexiste pas.</p> */}
            <input onClick={() => history.push('/')} type="submit" className="btn2" value="Accueil" />
        </div>
    );
};

export default Page404;
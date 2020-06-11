import React from "react";
import { useDispatch, useSelector } from 'react-redux';
import { useHistory } from 'react-router';

// Import action
import { disconnected, TOGGLE_MENU_NAVBAR } from 'src/store/actions';

import './style.scss';

const MenuNavbar = () => {
    const history = useHistory();
    const dispatch = useDispatch();

    return (
        <div className="menu_navbar_container">
            <div
                onClick={() => { dispatch({ type: TOGGLE_MENU_NAVBAR }) }}
                className="menu_navbar_x">
                <span>X</span>
            </div>
            <h3>Menu</h3>
            <div className="menu_navbar_container_content">
                <p onClick={() => history.push('/about')}>A propos</p>
                <p onClick={() => { dispatch(disconnected(history)) }}>Se déconnecter</p>
            </div>
        </div>
    );
};

export default MenuNavbar;
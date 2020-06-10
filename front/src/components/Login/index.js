import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useHistory } from 'react-router';
import Logo from "../../assets/O'school.png";
import Logo_Stud from "../../assets/bg.svg";

// Import action
import { syncEmail, syncPassword, login } from 'src/store/actions';

// Import scss
import './styles.scss';

const Login = () => {

    const dispatch = useDispatch();
    const history = useHistory();
    const emailUser = useSelector((state) => state.email);
    const passwordUser = useSelector((state) => state.password);
    return (

        <div className="container-login">
            <div className="img">
                <img src={Logo_Stud} />
            </div>
            <div className="login-content">
                <form
                    onSubmit={(evt) => {
                        evt.preventDefault();
                        dispatch(login(history));
                    }}
                >
                    <img src={Logo} />
                    <h2 className="title">Bienvenue</h2>
                    <div className="input-div one">
                        <div className="i">
                            <i className="fas fa-user"></i>
                        </div>
                        <div className="div">
                            <input
                                type="text"
                                placeholder="Email"
                                className="input"
                                value={emailUser}
                                onChange={(evt) => {
                                    const newEmailUser = evt.target.value;
                                    dispatch(syncEmail(newEmailUser));
                                }}
                            />
                        </div>
                    </div>
                    <div className="input-div pass">
                        <div className="i">
                            <i className="fas fa-lock"></i>
                        </div>
                        <div className="div">
                            <input
                                type="password"
                                placeholder="Password"
                                className="input"
                                value={passwordUser}
                                onChange={(evt) => {
                                    const newPasswordUser = evt.target.value;
                                    dispatch(syncPassword(newPasswordUser));
                                }}
                            />
                        </div>
                    </div>
                    <input type="submit" className="btn_login" value="Login" />
                </form>
            </div>
        </div>








    )
}

export default Login;
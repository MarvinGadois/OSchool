import React from 'react';
import { useDispatch, useSelector } from 'react-redux';

//Import action
import { syncEmail, syncPassword } from 'src/store/actions';

// Import scss
import './styles.scss';

const Login = () => {
    const dispatch = useDispatch();
    const emailUser = useSelector((state) => state.email);
    const passwordUser = useSelector((state) => state.password);
    return (
        <div className="container">
            <form>
                <div className="form-group">
                    <input
                        placeholder="Email address"
                        type="email"
                        className="form-control"
                        id="exampleInputEmail1"
                        onChange={(evt) => {
                            const newEmailUser = evt.target.value;
                            dispatch(syncEmail(newEmailUser));
                        }}
                    />
                </div>
                <div className="form-group">

                    <input placeholder="Password" type="password" className="form-control" id="exampleInputPassword1" />
                </div>

                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        </div>
    )
}

export default Login;


import React from 'react'
import { connect } from 'react-redux'
import { Redirect } from 'react-router-dom'
import { login } from '../../redux/reducers/authReducer'
import LoginForm from './LoginForm'

const Login = ({ login, isAuth, authId }) => {
    if (isAuth) {
        return <Redirect to={`/profile/${authId}`} />
    }

    return (
        <div>
            <LoginForm login={login} />
        </div>
    )
}

const mapStateToProps = (state) => ({
    isAuth: state.auth.isAuth,
    authId: state.auth.id,
})

export default connect((mapStateToProps), { login })(Login)

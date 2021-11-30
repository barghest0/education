
import React, { useEffect } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router-dom'
import { compose } from 'redux'
import { logout } from '../../redux/reducers/authReducer'
import { setProfileData } from '../../redux/reducers/profileReducer'
import Profile from './Profile'

const ProfileContainer = ({ userData, match, setProfileData, isAuth, logout }) => {
    let id = match.params.id
    useEffect(() => {
        setProfileData(id)
    }, [])
    return (
        <Profile userData={userData} isAuth={isAuth} logout={logout} />
    )
}


const mapStateToProps = (state) => ({
    userData: state.profile.userData,
    isAuth: state.auth.isAuth,

})


export default compose(connect(mapStateToProps, { setProfileData, logout }), withRouter)(ProfileContainer) 

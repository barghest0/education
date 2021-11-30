
import { Button } from '@mui/material'
import React from 'react'
import { Redirect } from 'react-router-dom'


const Profile = ({ userData, isAuth, logout }) => {
    if (!isAuth) {
        return <Redirect to={'/'} />
    }

    return (
        <>
            <h1>{userData.login}</h1>
            <Button variant="contained" to={'/'} onClick={() => logout()}>Выйти</Button>
        </>
    )
}


export default Profile
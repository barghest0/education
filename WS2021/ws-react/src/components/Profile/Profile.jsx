import { Navigate, useNavigate } from "react-router"






const Profile = ()=>{
    const navigate = useNavigate()
    const auth = false
    if (auth === false) {
        return <Navigate to={'/login'}/>

    }
    return(
        <div>Профиль</div>
    )
}


export default Profile
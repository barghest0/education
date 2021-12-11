import { NavLink } from "react-router-dom"
import classes from "./auth.module.css"


const Login = ()=>{
    return(
        <div className="wrapper">
            <h1 className="title">Войти</h1>
            <div className={classes.auth}>
                <div className={classes.auth__inner}>
            <form action="" className={classes.authForm}>
                <div className="input__field">
                    <input type="text" className='' maxLength='11' placeholder="Номер телефона"  name="" id=""/>
                </div>
                <div className="input__field">
                    <input type="password" className='' placeholder="Пароль" name="" id=""/>
                </div>
            </form>
            <NavLink className='btn' to='/register'>Регистрация</NavLink>
            </div>
            </div>
        </div>

    )
}

export default Login
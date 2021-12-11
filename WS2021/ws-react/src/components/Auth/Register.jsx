import { useEffect, useRef, useState } from "react"
import { NavLink } from "react-router-dom"
import { Navigate, useNavigate } from 'react-router'
import classes from "./auth.module.css"


const Register = () => {
    const data = {}
    const [error, setError] = useState()
    const navigate = useNavigate()

    const handleChange = (e) => {
        data[e.target.name] = e.target.value
        console.log(data)
    }



    const submitForm = async (e) => {
        e.preventDefault()
        console.log('Зарегистрирован')
        // if (!error) {
        // const response = await fetch('http://localhost/WS2021/ws-rest/web/user/register', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify(data)
        // })

        // if (response.ok) {
        //     navigate('/login') 
        // }

        // }
    }

    return (
        <div className="wrapper">
            <h1 className="title">Регистрация</h1>
            <div className={classes.auth}>
                <div className={classes.auth__inner}>
                    <form action="" className={classes.authForm} onSubmit={submitForm}>
                        <div className="input__field">
                            <input onChange={handleChange} type="text" placeholder="Имя" name='name' />
                        </div>
                        <div className="input__field">
                            <input onChange={handleChange} name='surname' type="text" placeholder="Фамилия" />
                        </div>
                        <div className="input__field">
                            <input onChange={handleChange} name='email' type="email" placeholder="Email" />
                        </div>
                        <div className="input__field">
                            <select name='role' onChange={handleChange}>
                                <option value="0" selected>Путешествующий</option>
                                <option value="1">Туроператор</option>
                            </select>
                        </div>
                        <div className="input__field">
                            <input onChange={handleChange} type="text" name='phone' maxLength='11' placeholder="Телефон" />
                        </div>
                        <div className="input__field">
                            <input onChange={handleChange} name='password' type="password" placeholder="Пароль" />
                        </div>
                        <div className="input__field">
                            <input type="password" placeholder="Подтверждение пароля" />
                        </div>
                        <div className="input__field">
                            <input type="date" onChange={handleChange} name='birthdate' placeholder="Подтверждение пароля" />
                        </div>
                        {<div className={classes.error}>{error}</div>}
                        <button className='btn' type="submit">Зарегистрироваться</button>

                    </form>
                    <NavLink className='btn' to='/login'>Войти</NavLink>

                </div>
            </div>
        </div>

    )
}

export default Register
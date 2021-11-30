import React from 'react'
import { Formik } from 'formik'
import users from '../../redux/database'
import TextField from '@mui/material/TextField'
import { Button } from '@mui/material'
import classes from "./Login.module.scss"



const LoginForm = ({ login }) => (
    <div>
        <Formik
            initialValues={{ login: '', password: '' }}
            validate={values => {
                const errors = {}
                if (!values.login) {
                    errors.login = 'Обязательное поле'

                } else if (!values.password) {
                    errors.password = 'Обязательное поле'
                }
                return errors
            }}
            onSubmit={(values) => {
                const id = users.find(item => item.login === values.login && item.password === values.password).id
                console.log(values)
                login(id, values.login, values.password)
            }
            }
        >
            {({
                values,
                errors,
                touched,
                handleChange,
                handleBlur,
                handleSubmit,
                isSubmitting,
            }) => (
                <form className={classes.loginForm} onSubmit={handleSubmit}>
                    <div className={classes.textField}>
                        {errors.login && touched.login && errors.login}
                        <TextField
                            id="outlined-required"
                            label="Login"
                            name="login"
                            onChange={handleChange}
                            onBlur={handleBlur}
                            value={values.login}
                        />
                    </div>
                    <div className={classes.textField}>
                        {errors.password && touched.password && errors.password}
                        <TextField
                            id="outlined-required"
                            label="Password"
                            name="password"
                            onChange={handleChange}
                            onBlur={handleBlur}
                            value={values.password}
                        />
                    </div>

                    <Button variant="contained" type="submit" disabled={users.filter(item => item.login === values.login && item.password === values.password).length === 0}>
                        Войти
                    </Button>
                </form>
            )}
        </Formik>
    </div >
)




export default LoginForm
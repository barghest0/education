const SET_USER_DATA = 'SET_USER_DATA'

const initialState = {
    id: null,
    login: null,
    password: null,
    isAuth: null,
}

const authReducer = (state = initialState, action) => {
    switch (action.type) {
        case SET_USER_DATA:
            return {
                ...state,
                id: action.id,
                login: action.login,
                password: action.password,
                isAuth: action.isAuth,
            }
        default:
            return state
    }
}

export const setUserData = (id, login, password, isAuth) => ({
    type: SET_USER_DATA,
    id,
    login,
    password,
    isAuth,
})

export const login = (id, login, password) => dispatch => {
    console.log(id)
    dispatch(setUserData(id, login, password, true))
}

export const logout = () => dispatch => {
    dispatch(setUserData('', '', '', false))
}

export default authReducer

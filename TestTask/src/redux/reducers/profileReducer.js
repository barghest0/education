import users from '../database'

const SET_PROFILE_DATA = 'SET_PROFILE_DATA'

const initialState = {
    userData: {},
}

const profileReducer = (state = initialState, action) => {
    switch (action.type) {
        case SET_PROFILE_DATA:
            return {
                ...state,
                userData: action.userData,
            }
        default:
            return state
    }
}

export const setProfileDataSuccess = data => ({
    type: SET_PROFILE_DATA,
    userData: data,
})

export const setProfileData = id => dispatch => {
    const data = users.find(item => item['id'] === id)
    dispatch(setProfileDataSuccess(data))
}

export default profileReducer

import { combineReducers, createStore, applyMiddleware } from 'redux'
import authReducer from './reducers/authReducer'
import thunkMiddleware from 'redux-thunk'
import profileReducer from './reducers/profileReducer'

const reducers = combineReducers({
    auth: authReducer,
    profile: profileReducer,
})

const store = createStore(reducers, applyMiddleware(thunkMiddleware))

window.store = store
export default store

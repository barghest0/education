import './App.scss'
import { Route } from 'react-router-dom'
import ProfileContainer from './components/profile/ProfileContainer'
import Login from './components/login/Login'

const App = () => {
    return (
        <div className='App'>
            <div className='container'>
                <Route
                    path='/profile/:id?'
                    render={() => <ProfileContainer />}
                />
                <Route path='/' exact render={() => <Login />} />
            </div>
        </div>
    )
}

export default App

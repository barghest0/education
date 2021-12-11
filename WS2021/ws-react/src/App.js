import './App.css'
import { Route, Routes } from 'react-router'
import Main from './components/Main/Main'
import Header from './components/Header/Header'
import Footer from './components/Footer/Footer'
import Tours from './components/Tours/Tours'
import TourItem from './components/TourItem/TourItem'
import Profile from './components/Profile/Profile'
import Register from './components/Auth/Register'
import Login from './components/Auth/Login'

function App() {
    return (
        <div className='App'>
            <Header />
            <div className='container'>
                <Routes>
                    <Route exact path={'/'} element={<Main />} />
                    <Route exact path={'/tours'} element={<Tours />} />
                    <Route exact path={'/profile'} element={<Profile />} />
                    <Route exact path={'/login'} element={<Login />} />
                    <Route exact path={'/register'} element={<Register />} />
                    <Route strict path={'/tours/:id'} element={<TourItem />} />
                </Routes>
            </div>
            <Footer />
        </div>
    )
}

export default App

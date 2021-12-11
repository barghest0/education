import logo from './logo.svg'
import './App.css'
import Home from './Home'
import Route from './Route'
import Link from './Link'
import Main from './Main'

function App() {
    return (
        <div className='App'>
            <Link href='/main'>Main</Link>
            <Link href='/home'>Home</Link>
            <Route path='/home'>
                <Home />
            </Route>
            <Route path='/main'>
                <Main />
            </Route>
        </div>
    )
}

export default App

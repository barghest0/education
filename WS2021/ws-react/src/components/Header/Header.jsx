import { useRef, useState } from 'react'
import { NavLink, useSearchParams } from "react-router-dom"
import { useNavigate } from "react-router"

import classes from './Header.module.css'

const Header = () => {
    const [search, setSearch] = useState([])
    const searchTourInput = useRef()
    const searchTourResponseBlock = useRef()
    let navigate = useNavigate()

    const handleSearch = (e) => {
        if (e.target.value.length >= 3) {
            searchTourResponseBlock.current.style.display = 'flex'
            fetch(`http://localhost/WS2021/ws-rest/web/tours?name=${e.target.value}`)
                .then((response) => {
                    return response.json()
                }).then((response) => {
                    setSearch(response)
                })
        } else {
            searchTourResponseBlock.current.style.display = 'none'
            setSearch([])
        }
    }

    const handleClickSearchItem = (e) => {
        searchTourInput.current.value = e.target.innerHTML
        searchTourResponseBlock.current.style.display = 'none'
        const searchItem = search.find((item) => item.name === searchTourInput.current.value)
        navigate(`/tours/${searchItem.id}`)
        setSearch([])
    }
    const searchResponse = search.map(item => (
        <div className={classes.search__responseItem} onClick={handleClickSearchItem} key={item.id}>{item.name}</div>
    ))
    const submitSearch = (e) => {
        e.preventDefault()
        navigate(`/tours?q=${searchTourInput.current.value}`)
    }

    return (
        <header className={classes.header}>
            <div className="container">
                <div className={classes.header__inner}>
                    <NavLink className={classes.nav__link} to='/'>
                        <div className={classes.header__logo}>НН ТУР</div>
                    </NavLink>
                    <nav className={classes.nav}>
                        <NavLink className={classes.nav__link} to='/tours'>Туры</NavLink>
                        <NavLink className={classes.nav__link} to='/guide'>Путеводитель</NavLink>
                        <NavLink className={classes.nav__link} to='/profile'>Личный кабинет</NavLink>
                        <form action="" className={classes.nav__searchForm} onSubmit={submitSearch}>
                            <div className={classes.nav__searchField}>
                                <input type="text" className={classes.nav__searchInput} ref={searchTourInput} onChange={handleSearch} placeholder="Поиск..." />
                                <div className={classes.nav__searchResponse} ref={searchTourResponseBlock}>{searchResponse}</div>
                            </div>
                        </form>
                    </nav>
                </div>
            </div>
        </header >
    )

}

export default Header
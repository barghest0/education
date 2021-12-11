import { useEffect, useRef, useState } from 'react'
import { useNavigate } from 'react-router'
import { NavLink } from 'react-router-dom'
import classes from "./Main.module.css"


const Main = () => {
    const [stock, setStock] = useState([])
    const [search, setSearch] = useState([])
    const searchTourInput = useRef()
    const searchTourResponseBlock = useRef()
    const navigate = useNavigate()

    useEffect(() => {
        fetch('http://localhost/WS2021/ws-rest/web/stocks?expand=tour')
            .then((response) => {
                return response.json()
            }).then((response) => {
                setStock(response)
            })
    }, [])

    const sliderItems = stock.map((item) => (
        <NavLink to={`/tours/${item.tour.id}`} className={classes.slider__item} key={item.id}>
            <img className={classes.slider__image} src={`/assets/images/${item.tour.image}`} alt="" />
            <div className={classes.slider__info}>
                <div className={classes.slider__name}>{item.tour.name}</div>
                <div className={classes.slider__price}>{item.price} Рублеков</div>
            </div>
        </NavLink>
    ))


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
        <div className="wrapper">
            <div className={classes.main}>
                <h1 className="title">Самые выгодные поездки</h1>
                <div className={classes.main__slider}>
                    <div className={classes.slider} >
                        {sliderItems}
                        <span className={`${classes.slider__prev} ${classes.slider__pointer}`}> {'<'} </span>
                        <span className={`${classes.slider__next} ${classes.slider__pointer}`}> {'>'} </span>
                    </div>
                </div>
                <div className={classes.search}>
                    <h1 className="title">Быстрый поиск тура</h1>
                    <form className={classes.search__form} action="" onSubmit={submitSearch}>
                        <div className={classes.search__field}>
                            <input type="text" className={classes.search__input} ref={searchTourInput} onChange={handleSearch} placeholder="Название" />
                            <div className={classes.search__response} ref={searchTourResponseBlock}>{searchResponse}</div>
                        </div>
                        <div className={classes.search__dateFields}>
                            <div className={`${classes.search__field} ${classes.search__dateField}`}>
                                <input type="date" className={classes.search__input} placeholder="ГГГГ-ММ-ДД" />
                            </div>
                            <div className={`${classes.search__field} ${classes.search__dateField}`}>
                                <input type="date" className={classes.search__input} placeholder="ГГГГ-ММ-ДД" />
                            </div>
                        </div>
                        <div className={classes.search__field}>
                            <input type="number" min={0} max={10} className={classes.search__input} placeholder="Количество пассажиров" />
                        </div>
                        <div className={classes.search__button}>
                            <button type="submit" className="btn">Найти тур</button>
                        </div>
                    </form>
                </div>
            </div>
        </div >
    )

}

export default Main
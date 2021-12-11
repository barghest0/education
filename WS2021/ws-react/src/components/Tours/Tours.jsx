import { useEffect, useState,useRef } from 'react'
import { useSearchParams, NavLink } from 'react-router-dom'
import { useLocation, withRouter, useNavigate } from 'react-router'
import classes from './Tours.module.css'
const Tours = () => {
    let searchParams = useSearchParams()
    const [tours, setTours] = useState([])
    const search = useRef()
    const navigate = useNavigate()


    useEffect(() => {
        if (searchParams[0].get('q')) {
            fetch(`http://localhost/WS2021/ws-rest/web/tours?name=${searchParams[0].get('q')}`)
            .then((response) => {
                return response.json()
            }).then((response) => {
                setTours(response)
            })
        }else{
            fetch(`http://localhost/WS2021/ws-rest/web/tours`)
            .then((response) => {
                return response.json()
            }).then((response) => {
                setTours(response)
            })
        }
        
    }, [searchParams[0].get('q')])

 
    const submitSearch = (e)=>{
        e.preventDefault()
        navigate(`/tours?q=${search.current.value}`)
    }

    const toursItems = tours.map(item=>(
        <div to={`/tours/${item.slug}`} className={classes.tour} key={item.id}>
        <NavLink to={`/tours/${item.id}`} className={classes.tour__link}>
            <div className={classes.tour__inner}>
            <div className={classes.tour__image} >  
                <img src={`/assets/images/${item.image}`} />   
             </div>
                <div className={classes.tour__info}>
                    <div className={classes.tour__title}>{item.name}</div>
                    <div className={classes.tour__price}>{item.price} Рублей</div>
                </div>
            </div>
        </NavLink>
        </div>
    ))
    
    return (
        <div className="wrapper">
            <h1 className='title'>Туры</h1>
            <form action="" className={classes.tours__searchForm} onSubmit={submitSearch}>
                <div className={classes.tours__searchField}>
                    <input type="text" placeholder="Поиск..." ref={search} />
                </div>
                <button className="btn"  type="submit">Найти</button>
            </form>
            {toursItems}
        </div>
    )

}

export default Tours
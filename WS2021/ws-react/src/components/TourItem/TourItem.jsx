import { useEffect, useState } from 'react'
import { useLocation, withRouter } from 'react-router'
import classes from './TourItem.module.css'
const TourItem = () => {

    const [tour, setTour] = useState([])
    const location = useLocation()

    useEffect(() => {
        fetch(`http://localhost/WS2021/ws-rest/web/tours/${location.pathname.split('/').at(-1)}`)
            .then((response) => {
                return response.json()
            }).then((response) => {
                setTour(response)
            })
    }, [])
    console.log(tour)
    return (
        <div className="wrapper">
            <h1 className='title'>{tour.name}</h1>
            <div className={classes.tour__image}>
                <img src={`/assets/images/${tour.image}`} alt="" />
            </div>
        </div>
    )

}

export default TourItem
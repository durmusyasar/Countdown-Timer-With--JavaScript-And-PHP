let releaseDate = new Date('Apr 15, 2021 09:00:00')

function interval(){
    var current = new Date().getDate()
    var duration = releaseDate - current
    
    let days = Math.floor(duration / (24 * 60 * 60 * 1000))
    let hours = Math.floor(duration % (24 * 60 * 60 * 1000) / (60 * 60 * 1000))
    let mins = Math.floor(duration % (60 * 60 * 1000) / (60 * 1000))
    let seconds = Math.floor(duration % (60 * 1000) / 1000)

    let countdown = document.querySelector("#countdown")

    countdown.innerHTML = `
        <div class="counter-box">
            <span class="counter-number">${days}</span>
            <span class="counter-text">Days</span>
        </div>
        <div class="counter-box">
            <span class="counter-number">${hours}</span>
            <span class="counter-text">Hours</span>
        </div>
        <div class="counter-box">
            <span class="counter-number">${mins}</span>
            <span class="counter-text">Mins</span>
        </div>
        <div class="counter-box">
            <span class="counter-number">${seconds}</span>
            <span class="counter-text">Seconds</span>
        </div>
    `
    if (duration < 0) {
        countdown.style.color = '#76b328'
        countdown.style.fontSize = '22px'
        countdown.innerHTML = ' Website has been launched'
    }
}

var interval = setInterval(interval, 1000)

function closeInterval() {
    clearInterval(interval)
}
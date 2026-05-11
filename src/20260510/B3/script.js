/**@type {HTMLElement} */
const timer = document.getElementById("timer")

setInterval(() => {
    timer.textContent = new Date().toLocaleTimeString("JP")
}, 1000);
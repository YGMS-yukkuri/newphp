const h1 = document.querySelector("h1")

function disp() {
    const TIME = new Date
    h1.textContent = TIME.toLocaleTimeString("ja")
}

setInterval(() => {
   disp() 
}, 10);
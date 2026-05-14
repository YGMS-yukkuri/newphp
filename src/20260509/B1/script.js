const countDisp = document.querySelector(".countdown")
const button = document.querySelector("button")
let time = 10

button.addEventListener("click", () => {
    button.disabled = true;
    let aaaa = setInterval(() => {
        time--
        countDisp.textContent = time;
        if(time <= 3) {
            countDisp.style.color = "#ff0000"
        }
        if(time <= 0) {
            alert("Finished!")
            clearInterval(aaaa)
        }
    }, 1000);
})
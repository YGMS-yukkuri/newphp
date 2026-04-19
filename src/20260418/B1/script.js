const sec = document.getElementById("sec")
let countdown = 0;
let isActive = false
let isCont = false;
let timerNo = null;


function timer() {
    if (isActive) return;
    if (isCont) {
        isCont = true
        isActive = true

        timerNo = setInterval(() => {
            if (countdown === 0) {
                alert("Time's tp!")
                reset()
            } else {
                countdown--
                disp()
            }
        }, 1000);
    } else {
        if (sec.value === "" || sec.value === "0" || sec.value < 0) return;
        countdown = sec.value
        isCont = true
        isActive = true
        disp()
        timerNo = setInterval(() => {
            if (countdown === 0) {
                alert("Time's tp!")
                reset()
            } else {
                countdown--
                disp()
            }
        }, 1000);
    }
}

function stop() {
    clearInterval(timerNo)
    timerNo = null;
    isActive = false;
}

function disp() {
    const timerDisp = document.getElementById("display")
    let Dmin = Math.floor(countdown / 60)
    let Dsec = countdown - (60 * Dmin)

    strM = Dmin.toString().padStart(2, "0")
    strS = Dsec.toString().padStart(2, "0")

    timerDisp.textContent = `${strM}:${strS}`
}
function reset() {
    isActive = false;
    isCont = false;
    clearInterval(timerNo);
    countdown = 0
    disp()
}
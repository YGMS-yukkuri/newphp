const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")

let x = 0
let y = 100

function a() {
    ctx.beginPath()
    ctx.clearRect(0,0,1000,1000)
    ctx.fillStyle = "blue"
    ctx.arc(x,y,10,0,2*Math.PI)
    ctx.fill()
    ctx.stroke()
    x++
}

setInterval(() => {
    a()
}, 1000 / 60)
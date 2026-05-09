const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");
const width = canvas.width;
const height = canvas.height;

let x = width / 2;
const y = height / 2;
const r = 10;
let speed = 5;

function draw() {
  ctx.fillStyle = "red";
  ctx.fillRect(0, 0, width, height);
  ctx.beginPath();
  ctx.arc(x, y, r, 0, Math.PI * 2);
  ctx.fillStyle = "white";
  ctx.fill();
  ctx.closePath();
}

setInterval(() => {
  draw();
  x += speed
  if (x + r > width || x - r < 0) {
    speed = -speed;
  }
}, 10);
draw();
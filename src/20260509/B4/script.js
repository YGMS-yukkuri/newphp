const text = document.querySelector(".text")
const colorinp = document.getElementById("aa")
const colorout = document.querySelector(".colorout")
let color

colorinp.addEventListener("input", () => {
    color = colorinp.value;
    colorout.style.backgroundColor = color
    
    let colorR = color.slice(1,3)
    let colorG = color.slice(3,5)
    let colorB = color.slice(5,7)
     
    let R = parseInt(colorR,16)
    let G = parseInt(colorG,16)
    let B = parseInt(colorB,16)
    console.log(R);
    
    

    RGB = `rgb(${R},${G},${B})`

    text.textContent = `HEX: ${color} RGB: ${RGB}`
})
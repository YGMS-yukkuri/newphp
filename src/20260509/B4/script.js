const text = document.querySelector(".text")
const colorinp = document.getElementById("aa")
const colorout = document.querySelector(".colorout")
let color

colorinp.addEventListener("input", () => {
    color = colorinp.value;
    colorout.style.backgroundColor = color
    
    colorR = color.slice(1,3)
    colorG = color.slice(3,5)
    colorB = color.slice(5,7)
    
    //16->10進数に変換...
    R = String(colorR).toString(10)
    G = String(colorG).toString(10)
    B = String(colorB).toString(10)
    console.log(R);
    

    RGB = `rgb(${R},${G},${B})`

    text.textContent = `HEX: ${color} RGB: ${RGB}`
})
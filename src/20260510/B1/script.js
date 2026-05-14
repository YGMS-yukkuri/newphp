const inp = document.querySelector("input")
const text = document.querySelector("p")

inp.addEventListener("input", () => {
    const VAL = text.textContent
    const newStr = VAL.replaceAll(inp.value,"<span>" + inp.value + "</span>")
    text.innerHTML = newStr;

    const AA = text.querySelectorAll("span")
    console.log(Math.random().toString(16).slice(2,8));
    
    AA.forEach(element => {
        element.style.backgroundColor = `yellow`
    });
})
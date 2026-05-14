const inp = document.getElementById("colorINP")


inp.addEventListener("input", () => {
    const value = inp.value;
    const HEXR = value.slice(1,3)
    const HEXG = value.slice(3,5)
    const HEXB = value.slice(5,7)
    document.getElementById("b").textContent = `HEX:${value}`
    document.getElementById("a").textContent = `rgb(${parseInt(HEXR,16)},${parseInt(HEXG,16)},${parseInt(HEXB,16)})`
})
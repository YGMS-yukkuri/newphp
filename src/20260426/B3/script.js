const button = document.querySelector("button")
const body = document.body;
const h1 = document.querySelector("h1")
let isNi = false;

button.addEventListener("click", () => {
    h1.classList.toggle("dark")
    body.classList.toggle("dark")
    if(isNi) {
        h1.textContent = "ライトモードテスト"
        isNi = false
    }else {
        h1.textContent = "ナイトモードテスト"
        isNi = true
    }
})
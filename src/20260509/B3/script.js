const TEXT = document.getElementById("TEXT")
let isNight = false;

document.querySelector("button").addEventListener("click", () => {
    if (isNight) {
        isNight = false;
        document.body.style.backgroundColor = "#FFF"
        document.body.style.color = "#000"
        TEXT.textContent = "ライトモードテスト"
    } else {
        isNight = true;
        document.body.style.backgroundColor = "#000"
        document.body.style.color = "#FFF"
        TEXT.textContent = "ナイトモードテスト"
    }
})
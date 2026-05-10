const text = document.querySelector("div")

window.addEventListener("scroll", () => {
    const win = window.scrollY;
    const scrolld = window.innerHeight;
    const height = document.body.scrollHeight
    console.log(win, height, scrolld);
    
    const per = (win) / (height - scrolld) * 100
    text.textContent = per + "%"
})
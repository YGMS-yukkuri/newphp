const button = document.querySelector("button")

window.addEventListener("scroll", () => {
    const scroll = window.scrollY
    const view = window.innerHeight

    console.log(scroll, view);

    if (scroll + view === 5000) {
        button.style.display = "block"
        button.addEventListener("click", () => {
            button.style.display = "none"
            window.scrollTo(0,0)
        })
    } else {
        button.style.display = "none"
    }

})
const list = document.querySelectorAll("ul li")
const search = document.getElementById("text")

search.addEventListener("input", () => {
    list.forEach(element => {
        if(!element.textContent.includes(search.value)) {
            element.classList.add("hidden")
        } else {
            element.classList.remove("hidden")
        }
    });
})
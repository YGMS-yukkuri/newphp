/** @type {HTMLElement} */
const list = document.querySelector("#list");
/** @type {HTMLInputElement} */
const input = document.querySelector("#inp");
/** @type {HTMLButtonElement} */
const button = document.querySelector("#reg")

button.addEventListener("click", () => {
    add()
})

function add() {
    const text = input.value;
    if (text === "") return

    const li = document.createElement("li")

    li.textContent = text;

    const button1 = document.createElement("button")
    button1.textContent = "完了"
    button1.addEventListener("click", () => {
        const lili = button1.parentElement
        lili.classList.add("clear")
    })

    const button2 = document.createElement("button")
    button2.textContent = "未完了"
    button2.addEventListener("click", () => {
        const lili = button2.parentElement
        lili.classList.remove("clear")
    })
    li.appendChild(button1)
    
    li.appendChild(button2)

    list.appendChild(li)
}
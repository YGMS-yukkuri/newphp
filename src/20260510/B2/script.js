const table = document.querySelector("table")
const inp = document.getElementById("inp")
const button = document.getElementById("reg")


button.addEventListener("click", () => {
    if (inp.value = "") return;
    const tr = document.createElement("tr")
    const td1 = document.createElement("td")
    td1.textContent = inp.value
    tr.appendChild(td1)
    const td2 = document.createElement("td")
    const tdbtn1 = document.createElement("button").addEventListener("click", (e) => {
        parent.querySelector("td").classList.add("clear")
    })
    tdbtn1.textContent = "完了"
    const tdbtn2 = document.createElement("button").addEventListener("click", (e) => {
        parent.querySelector("td").classList.remove("clear")
    })
    tdbtn2.textContent = "未完了"
    td2.appendChild(tdbtn1)
    td2.appendChild(tdbtn2)

    tr.appendChild(td2)
})

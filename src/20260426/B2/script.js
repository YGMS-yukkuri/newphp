const inp = document.querySelector("input");
const btn = document.querySelector(".add");
const box = document.querySelector(".disp")

let = postID = 0;

btn.addEventListener("click", (e) => {
    {
        let messe = inp.value;
        const h2 = document.createElement("h2")
        const compBtn = document.createElement("button")
        const delBtn = document.createElement("button")
        h2.textContent = textContent = messe;
        compBtn.textContent = "Complete"
        delBtn.textContent = "Delete"

        const div = document.createElement("div")
        div.appendChild(h2)
        div.appendChild(compBtn)
        div.appendChild(delBtn)
        box.appendChild(div)

        delBtn.addEventListener("click", () => {
            box.removeChild(div)
        })

        compBtn.addEventListener("click", () => {
            h2.style.textDecoration = " line-through"
        })
    }
})

const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const passwordRe = document.getElementById("passwordRe");
let err = 0;

function val() {
    const wars = document.querySelectorAll(".warning")
    wars.forEach(element => {
        element.remove()
    });

    if (username.value.length < 3) {
        err++
        const aleart = document.createElement("p")
        aleart.textContent = "項目に誤りがあります";
        aleart.classList.add("warning")
        username.parentElement.appendChild(aleart);
    }

    if (!/^[A-Za-z0-9]+@[a-z]+\[a-z]{2,}/.test(email.value)) {
        const aleart = document.createElement("p")
        aleart.textContent = "項目に誤りがあります";
        aleart.classList.add("warning")
        email.parentElement.appendChild(aleart);

    }
}
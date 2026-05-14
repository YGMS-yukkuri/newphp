let lang = localStorage.getItem("lang") || "ja";
const select = document.querySelector("#select-lang");
const text = document.querySelector("#text");
select.value = lang;

function changeLang() {
  lang = select.value;
  localStorage.setItem("lang", lang);
  updateText();
}

function updateText() {
	switch (lang) {
		case "ja":
			text.textContent = "ようこそウェブデザインの世界へ！";
			break;
		case "en":
			text.textContent = "Welcome to the world of web design!";
			break;
	}
}

select.addEventListener("change", changeLang);
updateText();
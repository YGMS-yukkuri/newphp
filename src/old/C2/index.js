const base10 = document.querySelector("#base10");
const base2 = document.querySelector("#result-base2");
const base16 = document.querySelector("#result-base16");
const btn = document.querySelector("#btn");

btn.addEventListener("click", () => {
  const base10Value = Number.parseInt(base10.value);
  base2.textContent = `2進数: ${base10Value.toString(2)}`;
  base16.textContent = `16進数: ${base10Value.toString(16).toUpperCase()}`;
});
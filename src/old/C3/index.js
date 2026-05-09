const pageTopBtn = document.querySelector("#page-top-btn");

function checkScroll() {
  if (window.scrollY === 0) {
    pageTopBtn.style.display = "none";
  } else {
    pageTopBtn.style.display = "";
  }
}

pageTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

window.addEventListener("scroll", checkScroll);
checkScroll();
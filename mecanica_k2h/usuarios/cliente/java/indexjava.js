
const rightBtn = document.querySelector("#scrolling-button-right");
const leftBtn = document.querySelector("#scrolling-button-left");

const content = document.querySelector(".scrolling-container");

rightBtn.addEventListener("click", () => {
  content.scrollLeft += 800;
});

leftBtn.addEventListener("click", () => {
  content.scrollLeft -= 800;
});


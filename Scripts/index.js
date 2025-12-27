let btnClick = document.querySelector("button");

btnClick.addEventListener("click", () => {
    window.location.href = "Sites/page1.php";
})

document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("getStartedBtn");
  if (!btn) return;

  btn.addEventListener("click", () => {
    window.location.href = "Sites/page1.php";
  });
});

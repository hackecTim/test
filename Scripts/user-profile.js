window.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".saved-card, .profile-header");
  cards.forEach((el, i) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(8px)";
    el.style.transition = "opacity .35s ease, transform .35s ease";
    setTimeout(() => {
      el.style.opacity = "1";
      el.style.transform = "translateY(0)";
    }, 80 + i * 60);
  });
});

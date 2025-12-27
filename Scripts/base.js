document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  if (!header) return;

  const toggle = header.querySelector(".nav-toggle");
  const nav = header.querySelector("#siteNav");
  if (!toggle || !nav) return;

  const open = () => {
    nav.classList.add("is-open");
    toggle.setAttribute("aria-expanded", "true");
  };

  const close = () => {
    nav.classList.remove("is-open");
    toggle.setAttribute("aria-expanded", "false");
  };

  toggle.addEventListener(
    "click",
    (e) => {
      // capture click early, before other scripts
      e.preventDefault();
      e.stopPropagation();

      if (nav.classList.contains("is-open")) close();
      else open();
    },
    true // <-- CAPTURE MODE (important if index.js listens too)
  );

  document.addEventListener("click", (e) => {
    if (!nav.classList.contains("is-open")) return;
    if (!header.contains(e.target)) close();
  });

  nav.addEventListener("click", (e) => {
    if (e.target.closest("a")) close();
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 780) close();
  });
});

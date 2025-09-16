window.addEventListener("pageshow", function (e) {
  if (e.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
    window.location.reload();
  }
});

document.addEventListener('DOMContentLoaded', () => { 
  const navs = document.querySelectorAll(".nav-link");
  const tabPanels = document.querySelectorAll(".tab");

  navs.forEach(tab => {
    tab.addEventListener("click", () => {
      navs.forEach(t => t.classList.remove("active"));
      tab.classList.add("active");

      tabPanels.forEach(panel => {
        panel.classList.add("d-none");
        panel.classList.remove("d-flex");
      });

      if (tab.id === "dashboard-tab") {
        document.querySelector(".dashboard").classList.remove("d-none");
        document.querySelector(".dashboard").classList.add("d-flex");
      } else if (tab.id === "reports-tab") {
        document.querySelector(".reports").classList.remove("d-none");
        document.querySelector(".reports").classList.add("d-flex");
      } else if (tab.id === "profile-tab") { 
        document.querySelector(".profile").classList.remove("d-none");
        document.querySelector(".profile").classList.add("d-flex");
      }
    });
  });
});
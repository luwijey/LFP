window.addEventListener("pageshow", function (e) {
  if (e.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
    window.location.reload();
  }
});

document.addEventListener('DOMContentLoaded', () => { 
  const navs = document.querySelectorAll(".nav-link");
  const tabPanels = document.querySelectorAll(".tab-pane");

  navs.forEach(tab => {
    tab.addEventListener("click", () => {
      navs.forEach(t => t.classList.remove("active"));
      tab.classList.add("active");

      tabPanels.forEach(panel => {
        panel.classList.remove("show","active");
      });

      if (tab.id === "dashboard-tab") {
        document.querySelector(".dashboard").classList.add("show", "active");
      } else if (tab.id === "reports-tab") {
        document.querySelector(".reports").classList.add("show", "active");
      } else if (tab.id === "profile-tab") { 
        document.querySelector(".profile").classList.add("show", "active");
      }
    });
  });
});
window.addEventListener("pageshow", function (e) {
  if (e.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
    window.location.reload();
  }
});

//function for navigation buttons
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

{
//Create Report Modal 
  const createReport = document.getElementById("createReport");
  const reportModal = document.getElementsByClassName("reportModal")[0];

  const openModal = () => {
    reportModal.classList.remove("d-none");
    reportModal.classList.add("d-flex");
  }

  const closeModal = () => {
    reportModal.classList.remove("d-flex");
    reportModal.classList.add("d-none");
  }

  createReport.addEventListener("click", openModal);

  reportModal.addEventListener("click", (e) => {
    if(e.target === reportModal) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if(e.key === "Escape") closeModal();
  });

}

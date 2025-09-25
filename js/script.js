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

  //buttons
  const createReport = document.getElementById("createReport");
  const lost = document.getElementById("lost");
  const found = document.getElementById("found");

  //modals
  const reportModal = document.querySelector(".reportModal");
  const lostForm = document.querySelector(".lostForm");
  const foundForm = document.querySelector(".foundForm");
  const entryForm = document.querySelector(".entryForm");

  //icons
  const closeIco = document.querySelectorAll("#close-modal");
  const returnFunction = document.querySelectorAll("#return");

  const forms = [lostForm, foundForm, entryForm];
  const hideAllForms = () => forms.forEach(hide);

  //functions
  const show = (el) => { 
    el.classList.remove("d-none");
    el.classList.add("d-flex");
  };

  const hide = (el) => {
    el.classList.remove("d-flex");
    el.classList.add("d-none");
  };

  const openModal = () => {
   show(reportModal);
   hideAllForms();
   show(entryForm);
  };

  const openLost = () => {
    hideAllForms();
    show(lostForm);
  };

  const openFound = () => {
    hideAllForms();
    show(foundForm);
  };

  const closeModal = () => {
   hideAllForms();
   hide(reportModal);
  };

  //event listeners
  lost.addEventListener("click", openLost);
  found.addEventListener("click", openFound);
  createReport.addEventListener("click", openModal);

  closeIco.forEach(icon => {
    icon.addEventListener("click", closeModal);
  });

  returnFunction.forEach(btn => {
    btn.addEventListener("click", openModal);
  });

  reportModal.addEventListener("click", (e) => {
    if (e.target === reportModal) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

}


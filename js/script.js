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
  const reportModal = document.getElementsByClassName("reportModal")[0];
  const lostForm = document.getElementsByClassName("lostForm")[0];
  const foundForm = document.getElementsByClassName("foundForm")[0];
  const entryForm = document.getElementsByClassName("entryForm")[0];

  //icons
  const closeIco = document.querySelectorAll("#close-modal");
  const returnFunction = document.querySelectorAll("#return");

  const openModal = () => {
    reportModal.classList.remove("d-none");
    reportModal.classList.add("d-flex");

    entryForm.classList.remove("d-none");
    entryForm.classList.add("d-flex");
  }

   const openLost = () => {
    lostForm.classList.remove("d-none");
    foundForm.classList.remove("d-flex");
    entryForm.classList.remove("d-flex");

    lostForm.classList.add("d-flex");
  }

   const openFound = () => {
    foundForm.classList.remove("d-none");
    lostForm.classList.remove("d-flex");
    entryForm.classList.remove("d-flex");

    foundForm.classList.add("d-flex");
  }

  const closeModal = () => {
    reportModal.classList.remove("d-flex");
    lostForm.classList.remove("d-flex");
    foundForm.classList.remove("d-flex");
    entryForm.classList.remove("d-flex");

    reportModal.classList.add("d-none");
    lostForm.classList.add("d-none");
    foundForm.classList.add("d-none");
    entryForm.classList.add("d-none");
  }

  lost.addEventListener("click", openLost);
  found.addEventListener("click", openFound);

  closeIco.forEach(icon => {
    icon.addEventListener("click", closeModal);
  });

  returnFunction.forEach(toggle => {
    toggle.addEventListener("click", () => {
      foundForm.classList.remove("d-flex");
      lostForm.classList.remove("d-flex");
      foundForm.classList.add("d-none");
      lostForm.classList.add("d-none");

      openModal();

    });
  });

  createReport.addEventListener("click", openModal);

  reportModal.addEventListener("click", (e) => {
    if (e.target === reportModal) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

}


window.addEventListener("pageshow", function (e) {
  if (e.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
    window.location.reload();
  }
});


//functions
const show = (el) => {
  el.classList.remove("d-none");
  el.classList.add("d-flex");
};

const hide = (el) => {
  el.classList.remove("d-flex");
  el.classList.add("d-none");
};


//for navigation buttons
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
  const sortSelect = document.getElementById("sort");
  const foundPage = document.querySelector(".foundpage");
  const lostPage = document.querySelector(".lostpage");

  sortSelect.addEventListener("change", (e) => {
    const sortValue = e.target.value;
    if (sortValue === "found") {
      show(foundPage);
      hide(lostPage);
    } else if (sortValue === "lost") {
      show(lostPage);
      hide(foundPage);
    } else {
      show(foundPage);
      show(lostPage);
    }
  });
}


{
  //Create Report Modal 

  //buttons
  const createReport = document.getElementById("createReport");
  const lost = document.getElementById("lost");
  const found = document.getElementById("found");
  const foundAgreementBtn = document.getElementById("foundTC");
  const lostAgreementBtn = document.getElementById("lostTC");

  //modals
  const reportModal = document.querySelector(".reportModal");
  const lostForm = document.querySelector(".lostForm");
  const foundForm = document.querySelector(".foundForm");
  const entryForm = document.querySelector(".entryForm");
  const foundAgreementModal = document.querySelector(".foundAgreement");
  const lostAgreementModal = document.querySelector(".lostAgreement");
  const inputForms = document.getElementById("inputForms");

  //icons
  const closeIco = document.querySelectorAll("#close-modal");
  const closeAgreement = document.querySelectorAll("#close-agreement")
  const returnFunction = document.querySelectorAll("#return");

  const forms = [lostForm, foundForm, entryForm, foundAgreementModal, lostAgreementModal];
  const hideAllForms = () => forms.forEach(hide);

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
    inputForms.reset();
  };
  
  //for agreements 
  const openFoundAgreement = () => {
    show(foundAgreementModal);
  };

  const openLostAgreement = () => {
    show(lostAgreementModal);
  }

  //event listeners
  lost.addEventListener("click", openLost);
  found.addEventListener("click", openFound);
  createReport.addEventListener("click", openModal);
  foundAgreementBtn.addEventListener("click", openFoundAgreement);
  lostAgreementBtn.addEventListener("click", openLostAgreement);

  closeAgreement.forEach(agreement => {
    agreement.addEventListener("click", () => {
      if (agreement.closest(".foundAgreement")) {
        hide(foundAgreementModal);
      }

      if (agreement.closest(".lostAgreement")) {
        hide(lostAgreementModal);
      }
    });
  });

  returnFunction.forEach(btn => {
    btn.addEventListener("click", openModal);
  });

  closeIco.forEach(icon => {
    icon.addEventListener("click", closeModal);
  });

  reportModal.addEventListener("click", (e) => {
    if (e.target === reportModal) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

}



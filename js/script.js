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


{
  const navs = document.querySelectorAll(".nav-link");
  const tabPanels = document.querySelectorAll(".tab");

  const dashboard = document.querySelector(".dashboard");
  const reports = document.querySelector(".reports");
  const profile = document.querySelector(".profile");

  navs.forEach(tab => {
    tab.addEventListener("click", () => {
      navs.forEach(t => t.classList.remove("active"));
      tab.classList.add("active");

      tabPanels.forEach(panel => {
        panel.classList.add("d-none");
        panel.classList.remove("d-flex");
      });

      if (tab.id === "dashboard-tab") {
        show(dashboard);
      } else if (tab.id === "reports-tab") {
        show(reports)
      } else if (tab.id === "profile-tab") {
        show(profile);
      }
    });
  });
}


{
  //dashboard-tab
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
  // report-tab

  // buttons
  const createReport = document.getElementById("createReport");
  const lostBtn = document.getElementById("lost");
  const foundBtn = document.getElementById("found");
  const foundAgreementBtn = document.getElementById("foundTC");
  const lostAgreementBtn = document.getElementById("lostTC");
  const reportType = document.getElementById("report_type");

  // modals
  const reportModal = document.querySelector(".reportModal");
  const lostForm = document.querySelector(".lostForm");
  const foundForm = document.querySelector(".foundForm");
  const entryForm = document.querySelector(".entryForm");
  const foundAgreementModal = document.querySelector(".foundAgreement");
  const lostAgreementModal = document.querySelector(".lostAgreement");
  const inputForms = document.getElementById("inputForms");

  // icons 
  const closeAgreement = document.querySelectorAll(".close-agreement");
  const returnBtn = document.querySelectorAll(".return");

  const forms = [lostForm, foundForm, entryForm, foundAgreementModal, lostAgreementModal];
  const hideAllForms = () => forms.forEach(hide);

  const openModal = () => {
    show(reportModal);
    hideAllForms();
    show(entryForm);
  };

  const openform = (form, type = null) => {
    hideAllForms();
    show(form);
    if (type) reportType.value = type;
  };

  const openAgreement = (agreementModal) => {
    show(agreementModal);
  };

  const closeModal = () => {
    hideAllForms();
    hide(reportModal);
    inputForms.reset();
  };

  createReport.addEventListener("click", openModal);

  lostBtn.addEventListener("click", () => openform(lostForm, "lost"));
  foundBtn.addEventListener("click", () => openform(foundForm, "found"));

  foundAgreementBtn.addEventListener("click", () => openAgreement(foundAgreementModal));
  lostAgreementBtn.addEventListener("click", () => openAgreement(lostAgreementModal));

  returnBtn.forEach(btn => {
    btn.addEventListener("click", openModal);
  });

  reportModal.addEventListener("click", (e) => {
    if (e.target === reportModal || e.target.classList.contains("close-modal")) {
      closeModal();
    }
  });

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

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

}



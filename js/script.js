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
  const $ = (selector) => document.querySelector(selector);
  const $$ = (selector) => document.querySelectorAll(selector);

  const createReportBtn = $("#createReport");
  const lostBtn = $("#lost");
  const foundBtn = $("#found");
  const foundAgreementBtn = $("#foundTC");
  const lostAgreementBtn = $("#lostTC");
  const returnBtns = $$(".return");
  const closeAgreementBtns = $$(".close-agreement");

  const reportModal = $(".reportModal");
  const entryForm = $(".entryForm");
  const lostForm = $(".lostForm");
  const foundForm = $(".foundForm");
  const foundAgreementModal = $(".foundAgreement");
  const lostAgreementModal = $(".lostAgreement");
  const inputForms = $("#inputForms");
  const reportType = $("#report_type");

  const forms = [entryForm, lostForm, foundForm, foundAgreementModal, lostAgreementModal];

  const hideAll = () => forms.forEach(hide);

  const openUI = ({modal = null, form = null, type = null, showEntry = false } = {}) => {
    if (modal) show(modal);
    if (form || showEntry) {
      hideAll();
      show(form || entryForm);
    }
    if (type) reportType.value = type;
  };

  const closeModal = () => {
    hideAll();
    hide(reportModal);
    inputForms.reset();
  };

  createReportBtn.addEventListener("click", () => openUI({ modal: reportModal, showEntry: true}));

  lostBtn.addEventListener("click", () => openUI({ form: lostForm, type: "lost" }));
  foundBtn.addEventListener("click", () => openUI({ form: foundForm, type: "found" }));

  lostAgreementBtn.addEventListener("click", () => openUI({ modal: lostAgreementModal}));
  foundAgreementBtn.addEventListener("click", () => openUI({ modal: foundAgreementModal}));
  
  returnBtns.forEach((btn) => btn.addEventListener("click", () => openUI({ modal: reportModal, showEntry: true })));

  reportModal.addEventListener("click", (e) => {
    if (e.target === reportModal || e.target.classList.contains("close-modal")) closeModal();
  });

  closeAgreementBtns.forEach((btn) => 
    btn.addEventListener("click", () => hide(btn.closest(".foundAgreement, .lostAgreement")))
  );

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });
}

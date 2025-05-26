import './style.scss';


export function faqs_block() {
  const block = document.querySelector('.faqs_block');

  if (!block) return;

  const accordion = block.querySelector(".accordion");

  accordion.addEventListener("click", (e) => {
    const activePanel = e.target.closest(".accordion-panel");
    if (!activePanel) return;
    toggleAccordion(activePanel);
  });

  function toggleAccordion(panelToActivate) {
    const activeButton = panelToActivate.querySelector("button");
    const activePanel = panelToActivate.querySelector(".accordion-content");
    const activePanelIsOpened = activeButton.getAttribute("aria-expanded");

    if (activePanelIsOpened === "true") {
      activeButton.setAttribute("aria-expanded", false);
      activePanel.setAttribute("aria-hidden", true);
      panelToActivate.classList.remove("accordion-panel-style");
    } else {
      activeButton.setAttribute("aria-expanded", true);
      activePanel.setAttribute("aria-hidden", false);
      panelToActivate.classList.add("accordion-panel-style");
    }
  }



}

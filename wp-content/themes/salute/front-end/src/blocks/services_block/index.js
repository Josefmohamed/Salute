import './style.scss';

export function services_block() {
  const block = document.querySelector('.services_block');
  if (!block) return;

  const accordion = block.querySelector(".accordion");
  const accordions = block.querySelectorAll(".accordion-panel");

  accordion.addEventListener("click", (e) => {
    const activePanel = e.target.closest(".accordion-panel");

    if (!activePanel) return;
    toggleAccordion(activePanel);
  });

  function toggleAccordion(panelToActivate) {
    // Close all other panels first
    accordions.forEach((panel) => {
      if (panel !== panelToActivate) {
        const button = panel.querySelector("button");
        const content = panel.querySelector(".accordion-content");
        const learnLink = panel.querySelector(".link.learn");
        const labelSpan = learnLink?.querySelector(".label");

        button.setAttribute("aria-expanded", "false");
        content.setAttribute("aria-hidden", "true");
        panel.classList.remove("accordion-panel-style");

        if (labelSpan) {
          const openText = learnLink.getAttribute("data-open-label");
          labelSpan.textContent = openText;
        }
      }
    });

    // Now toggle the clicked panel
    const activeButton = panelToActivate.querySelector("button");
    const activePanel = panelToActivate.querySelector(".accordion-content");
    const learnLink = panelToActivate.querySelector(".link.learn");
    const labelSpan = learnLink?.querySelector(".label");

    const isOpen = activeButton.getAttribute("aria-expanded") === "true";

    if (isOpen) {
      activeButton.setAttribute("aria-expanded", "false");
      activePanel.setAttribute("aria-hidden", "true");
      panelToActivate.classList.remove("accordion-panel-style");

      if (labelSpan) {
        const openText = learnLink.getAttribute("data-open-label");
        labelSpan.textContent = openText;
      }
    } else {
      activeButton.setAttribute("aria-expanded", "true");
      activePanel.setAttribute("aria-hidden", "false");
      panelToActivate.classList.add("accordion-panel-style");

      if (labelSpan) {
        const closeText = learnLink.getAttribute("data-close-label");
        labelSpan.textContent = closeText;
      }
    }
  }
}
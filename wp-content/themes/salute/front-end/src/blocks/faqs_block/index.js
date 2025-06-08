import './style.scss';

export function faqs_block() {
  const block = document.querySelector('.faqs_block');

  if (!block) return;

  const accordion = block.querySelector(".accordion");
  const panels = accordion.querySelectorAll(".accordion-panel");

  // Open the first panel by default
  if (panels.length > 0) {
    openPanel(panels[0]);
  }

  accordion.addEventListener("click", (e) => {
    const clickedPanel = e.target.closest(".accordion-panel");
    if (!clickedPanel) return;

    // If the clicked panel is already open, close it
    const button = clickedPanel.querySelector("button");
    const isExpanded = button.getAttribute("aria-expanded") === "true";

    // Close all panels first
    panels.forEach(panel => closePanel(panel));

    // If the clicked panel was closed, open it
    if (!isExpanded) {
      openPanel(clickedPanel);
    }
  });

  function openPanel(panel) {
    const button = panel.querySelector("button");
    const content = panel.querySelector(".accordion-content");

    button.setAttribute("aria-expanded", "true");
    content.setAttribute("aria-hidden", "false");
    panel.classList.add("accordion-panel-style");
  }

  function closePanel(panel) {
    const button = panel.querySelector("button");
    const content = panel.querySelector(".accordion-content");

    button.setAttribute("aria-expanded", "false");
    content.setAttribute("aria-hidden", "true");
    panel.classList.remove("accordion-panel-style");
  }
}

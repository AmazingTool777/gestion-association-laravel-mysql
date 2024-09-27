import { Dropdown, Tooltip } from "bootstrap/js/index.esm";

// Dropdowns setup
const dropdownElementList = document.querySelectorAll(".dropdown-toggle");
[...dropdownElementList].forEach(
    (dropdownToggleEl) => new Dropdown(dropdownToggleEl)
);

// Tooltips setup
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
[...tooltipTriggerList].map(
    (tooltipTriggerEl) => new Tooltip(tooltipTriggerEl)
);

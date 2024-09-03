import { Dropdown } from "bootstrap/js/index.esm";

// Dropdowns setup
const dropdownElementList = document.querySelectorAll(".dropdown-toggle");
[...dropdownElementList].forEach(
    (dropdownToggleEl) => new Dropdown(dropdownToggleEl)
);

// Make the donation calls cards clickable as links
const donationCallCards = document.querySelectorAll("[data-donation-call-url]");
for (const card of donationCallCards) {
    card.addEventListener("click", (e) => {
        e.preventDefault();
        window.location.href = card.getAttribute("data-donation-call-url");
    });
}

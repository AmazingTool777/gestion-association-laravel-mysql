import setupNavbarMenu from "../components/navbar-menu";

// The slot entry point in the back-office
const boSlotEntry = document.querySelector(".bo-content-layout");

// Sidenav setup
setupNavbarMenu({
    menuId: "bo-sidenav",
    overlay: "bo-sidenav-overlay",
    onOpen() {
        boSlotEntry.classList.add("has-menu-open");
    },
    onClose() {
        boSlotEntry.classList.remove("has-menu-open");
    },
});

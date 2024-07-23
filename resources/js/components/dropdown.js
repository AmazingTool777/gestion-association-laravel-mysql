// Default options
const defaultOptions = {
    // ClassName of the toggle
    toggleClassName: "toggle-open",
    // Classname of the dropdown menu
    menuClassName: "dropdown-open",
    // Whether to hide the dropdown menu when a link or a button within the menu is clicked
    hideOnActionClick: true,
};

// Function that toggles the classNames of dropdowns between open/closed states
function toggleDropdown(toggle, menu, options) {
    toggle.classList.toggle(options.toggleClassName);
    menu.classList.toggle(options.menuClassName);
}

// Sets a dropdown stystem on HTML elements
export default function setDropdown(toggleTarget, _options = defaultOptions) {
    const options = { ...defaultOptions, ..._options };
    const toggle = document.querySelector(`[data-toggle="${toggleTarget}"]`);
    const menu = document.getElementById(toggleTarget);
    // Open state of the dropdown
    let isOpen = false;

    /*
     * On toggle click, the open state of the dropdown is toggled
     */
    toggle.onclick = () => {
        toggleDropdown(toggle, menu, options);
        isOpen = !isOpen;
    };

    /**
     * If we should hide the menu on action click,
     * an event handler that closes the menu on click should be defined
     */
    if (options.hideOnActionClick) {
        const actionElts = document.querySelectorAll(
            `#${toggleTarget} a, #${toggleTarget} button`
        );

        const handleMenuClose = () => {
            if (isOpen) {
                toggleDropdown(toggle, menu, options);
                isOpen = false;
            }
        };

        for (const actionElt of actionElts) {
            actionElt.addEventListener("click", handleMenuClose);
        }
    }

    /*
     * If anything outside of the menu that is different from the toggle is clicked
     * and the dropdown is open,
     * Then we should close the dropdown
     */
    window.addEventListener("click", (e) => {
        if (
            isOpen &&
            !menu.contains(e.target) &&
            !toggle.isSameNode(e.target) &&
            !toggle.contains(e.target)
        ) {
            toggleDropdown(toggle, menu, options);
            isOpen = false;
        }
    });
}

/**
 * The possible className arguments when the menu is open
 * @typedef {Object} OpenClassNames
 * @property {string|undefined} activator The className applied to the activator when open
 * @property {string|undefined} menu The className applied to the menu when open
 */

/**
 * The function signature of a callback that is called during a phase of an element such as the toggle and the menu
 * @callback ElementPhaseCallback
 * @param {HTMLElement} element The element as a DOM element
 */

/**
 * Toggle phase callback elements arguments
 * @typedef {Object} TogglePhaseElements
 * @property {HTMLElement} activator The toggle DOM element
 * @property {HTMLElement} menu The menu DOM element
 */

/**
 * Toggle phase callback
 * @callback TogglePhaseCallback
 * @param {TogglePhaseElements} elements The elements manipulated in a toggle phase
 */

/**
 * The options for a navbar menu
 * @typedef {Object} NavbarMenuOptions
 * @property {string} menuId The id of the navbar menu
 * @property {string|undefined} dataAttribute The name of of the HTML attribute on the toggle that holds the id of the target menu
 * @property {OpenClassNames|undefined} openClassNames The classNames of the menu and toggle when the menu is open
 * @property {boolean|undefined} defaultOpen Whether the menu should be open by default or not
 * @property {boolean|undefined} animated Whether the menu should be animated or not during a toggle phase
 * @property {number|undefined} desktopBreakpoint The desktop viewport in px beyond which the menu should always remain open
 * @property {string|HTMLElement|undefined} overlay The overlay or id of the overlay
 * @property {TogglePhaseCallback|undefined} onOpen When the menu gets open
 * @property {TogglePhaseCallback|undefined} onClose When the menu gets closed
 */

/**
 * Main: Sets up a navbar menu
 *
 * @param {NavbarMenuOptions} options The navbar menu options
 */
export function setupNavbarMenu(options) {
    const dataAttr = options?.dataAttribute ?? "data-navbar-menu-target";

    const activator = document.querySelector(
        `[${dataAttr}="${options.menuId}"]`
    );
    const menu = document.getElementById(options.menuId);

    const overlay =
        typeof options.overlay === "string"
            ? document.getElementById(options.overlay)
            : options.overlay;

    const openClassNames = {
        activator: "activator-open",
        menu: "menu-open",
        ...(options.openClassNames ?? {}),
    };

    let isOpen = false;

    /**
     * Toggles the menu
     *
     * @param {boolean|undefined} toOpen The next open state of the menu. If not specified, the next open state is the negation of the current open state.
     */
    function toggle(toOpen) {
        const _toOpen = toOpen ?? !isOpen;

        if (_toOpen) {
            options.onOpen && options.onOpen({ menu, activator });

            activator.classList.add(openClassNames.activator);
            if (options.animated) {
                menu.classList.add("enter");
                setTimeout(() => {
                    menu.classList.add("enter-to");
                }, 0);
            } else {
                menu.classList.add(openClassNames.menu);
            }
        } else {
            options.onClose && options.onClose({ menu, activator });

            activator.classList.remove(openClassNames.activator);
            if (options.animated) {
                menu.classList.add("leave");
                setTimeout(() => {
                    menu.classList.add("leave-to");
                }, 0);
            } else {
                menu.classList.remove(openClassNames.menu);
            }
        }

        if (overlay) {
            if (_toOpen) {
                overlay.style.display = "block";
                overlay.style.opacity = "0";
                setTimeout(() => {
                    overlay.style.opacity = "1";
                }, 0);
            } else {
                overlay.style.opacity = "0";
                overlay.addEventListener("transitionend", () => {
                    if (window.getComputedStyle(overlay).opacity === "0") {
                        overlay.style.display = "none";
                    }
                });
            }
        }

        menu.setAttribute("aria-hidden", !_toOpen);

        isOpen = _toOpen;
    }

    if (options.animated) {
        menu.addEventListener("transitionend", () => {
            if (menu.classList.contains("leave")) {
                options.onClose && options.onClose({ menu, activator });
                menu.classList.remove("leave", "leave-to", "enter-to", "enter");
            }
        });
    }

    if (overlay) {
        overlay.addEventListener("click", () => {
            toggle(false);
        });
    }

    if (options.defaultOpen) {
        toggle(true);
    }

    activator.addEventListener("click", () => {
        toggle();
    });

    if (options.desktopBreakpoint) {
        window.addEventListener("resize", () => {
            const screenWidth =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;
            if (screenWidth >= options.desktopBreakpoint) {
                if (isOpen) {
                    toggle(false);
                    menu.setAttribute("aria-hidden", false);
                }
                activator.setAttribute("aria-hidden", true);
            } else {
                menu.setAttribute("aria-hidden", !isOpen);
                activator.setAttribute("aria-hidden", false);
            }
        });
    }

    return {
        toggle,
        open: () => toggle(true),
        close: () => toggle(false),
    };
}

export default setupNavbarMenu;

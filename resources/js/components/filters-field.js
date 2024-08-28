const toggle = document.getElementById("page-filters-toggle");
const wrapper = document.getElementById("page-filters-wrapper");
const content = wrapper.firstElementChild;

// The collapsed state
let isCollapsed = true;

function handleToggle() {
    const toCollapse = !isCollapsed;

    if (toCollapse) {
        toggle.classList.remove("btn-secondary");
        toggle.classList.add("btn-light");
        toggle.setAttribute("aria-expanded", "false");
        toggle.setAttribute("title", "Afficher les filtres");
        wrapper.style.height = content.clientHeight + "px";
        setTimeout(() => {
            wrapper.style.height = "0";
        }, 0);
        wrapper.setAttribute("aria-hidden", "true");
    } else {
        toggle.classList.add("btn-secondary");
        toggle.classList.remove("btn-light");
        toggle.setAttribute("aria-expanded", "false");
        toggle.setAttribute("title", "Cacher les filtres");
        wrapper.style.height = "0";
        setTimeout(() => {
            wrapper.style.height = content.clientHeight + "px";
        }, 0);
        wrapper.setAttribute("aria-hidden", "false");
    }

    isCollapsed = toCollapse;
}

function handleWrapperExpandedTransitionEnd() {
    wrapper.style.removeProperty("height");
    if (isCollapsed) {
        wrapper.classList.add("h-0");
        wrapper.classList.remove("h-auto");
    } else {
        wrapper.classList.remove("h-0");
        wrapper.classList.remove("h-auto");
    }
}

wrapper.addEventListener("transitionend", handleWrapperExpandedTransitionEnd);

toggle.addEventListener("click", handleToggle);

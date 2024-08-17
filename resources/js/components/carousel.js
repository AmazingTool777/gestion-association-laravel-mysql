/**
 * @typedef CarouselSetupParams The arguments to a carousel setup
 * @property {number|string|undefined} transitionDuration The transition duration between slides. It can be a valid CSS `transition-duration` value or milliseconds if a number was provided.
 * @property {number|string|undefined} slideDuration The duration of a slide. It can be a valid CSS duration value or milliseconds if a number was provided.
 */

/**
 * The setup function of a carousel
 *
 * @param {HTMLElement} root The actual HTML element of the carousel itself
 * @param {CarouselSetupParams|undefined} params The parameters
 */
export function setupCarousel(root, params = {}) {
    const { slideDuration = 5000 } = params;

    const itemsWrapper = root.querySelector(`[data-carousel="items"]`);
    const items = itemsWrapper.children;
    const count = items.length;

    if (params.transitionDuration) {
        const transitionDuration =
            typeof params.transitionDuration === "number"
                ? `${params.transitionDuration}ms`
                : params.transitionDuration;
        for (const item of items) {
            item.style.transitionDuration = transitionDuration;
        }
    }

    let activeIndex = (() => {
        for (let i = 0; i < count; i++) {
            const item = items[i];
            if (item.classList.contains("active")) {
                return i;
            }
        }
        return 0;
    })();
    let activeItem = items.item(activeIndex);

    function next() {
        const nextActiveIndex = (activeIndex + 1) % count;
        const nextActiveItem = items.item(nextActiveIndex);

        activeItem.classList.add("leave");
        nextActiveItem.classList.add("enter-start");

        activeIndex = nextActiveIndex;
        activeItem = nextActiveItem;
    }

    function scheduleNext() {
        const nextActiveIndex = (activeIndex + 1) % count;
        const nextActiveItem = items.item(nextActiveIndex);
        nextActiveItem.classList.add("enter");
        setTimeout(next, slideDuration);
    }

    function handleTransitionEnd(e) {
        const item = e.target;
        if (
            item.classList.contains("active") &&
            item.classList.contains("leave")
        ) {
            item.classList.remove("active", "leave");
        } else if (
            item.classList.contains("enter") &&
            item.classList.contains("enter-start")
        ) {
            item.classList.remove("enter", "enter-start");
            item.classList.add("active");

            scheduleNext();
        }
    }

    for (const item of items) {
        item.addEventListener("transitionend", handleTransitionEnd);
    }

    scheduleNext();
}

/**
 * Setup of all carousels that have the `data-slide="carousel"` attribute in the HTML
 *
 * @param {CarouselSetupParams|undefined} params The parameters
 */
export function setupCarousels(params) {
    const carousels = document.querySelectorAll(`[data-slide="carousel"]`);
    for (const carousel of carousels) {
        setupCarousel(carousel, params);
    }
}

export default setupCarousels;

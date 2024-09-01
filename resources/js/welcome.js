import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

import setupCarousels from "./components/carousel";

// Intro carousel
setupCarousels({
    slideDuration: 8000,
});

// GSAP Plugins registration
gsap.registerPlugin(ScrollTrigger);

// Intro info card animation
gsap.to(".intro-info-card__layout", {
    translateY: 0,
    opacity: 1,
    delay: 0.5,
});

// About us card animation
gsap.to(".about-us__illustration-card", {
    scrollTrigger: {
        trigger: ".about-us__illustration-card",
        start: "center bottom",
    },
    opacity: 1,
});

// Service features animations
gsap.from(".service-feature", {
    scrollTrigger: {
        trigger: ".service-feature",
        start: "+50 bottom",
    },
    ease: "elastic.out(1,0.3)",
    opacity: 0,
    scale: 0.9,
    stagger: 0.25,
    duration: 4,
});

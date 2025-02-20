import gsap from "gsap";

const containerIndexPage = document.querySelector("#container-index-page");
const containerSearch = document.querySelector("#container-search");
const searchInput = document.querySelector("#search");
const iconSearch = document.querySelector("#icon-search");

searchInput.addEventListener("focus", () => {
    gsap.to(containerSearch, {
        y: -400,
        duration: 1,
        scale: 1.1,
        ease: "power4.in",
    });

    containerIndexPage.classList.add("backdrop-blur-lg");
});

searchInput.addEventListener("blur", () => {
    gsap.to(containerSearch, {
        y: 0,
        duration: 1,
        scale: 1,
        ease: "power4.out",
    });

    containerIndexPage.classList.remove("backdrop-blur-lg");
});

const rocketTitle = document.querySelector("#rocket-title");

document.addEventListener("DOMContentLoaded", () => {
    let animation = gsap.fromTo(
        rocketTitle,
        {
            y: -10,
        },
        {
            y: 0,
            duration: 2,
            ease: "bounce.in",
            repeat: Infinity,
        }
    );

    setInterval(() => {
        animation.reversed(!animation.reversed());
    }, 1500);
});

import gsap from "gsap";

gsap.fromTo(
    "#container-index-page",
    {
        scale: 1.5,
        opacity: 0,
    },
    {
        scale: 1,
        opacity: 1,
        duration: 3,
        ease: "power4.out",
    }
);

gsap.fromTo(
    "#title",
    {
        y: 30,
        opacity: 0,
    },
    {
        y: 0,
        opacity: 1.5,
        duration: 1,
        delay: 1,
        ease: "power4.out",
    }
);

gsap.fromTo(
    "#subtitle",
    {
        x: -30,
        opacity: 0,
    },
    {
        x: 0,
        opacity: 1,
        delay: 2,
        duration: 1,
        ease: "power4.out",
    }
);

const containerSearch = document.querySelector("#container-search");
const searchInput = document.querySelector("#search");
const rocketSearch = document.querySelector("#rocket");
const searchIcon = document.querySelector("#icon-search");

gsap.fromTo(
    searchInput,
    {
        width: 0,
        opacity: 0,
    },
    {
        width: "100%",
        opacity: 1,
        duration: 1.5,
        delay: 2,
        ease: "power4.out",
    }
);

gsap.fromTo(
    rocketSearch,
    {
        x: 30,
        opacity: 0,
    },
    {
        x: 0,
        opacity: 1,
        duration: 1,
        delay: 3,
        ease: "power4.out",
    }
);

gsap.fromTo(
    searchIcon,
    {
        x: -30,
        opacity: 0,
    },
    {
        x: 0,
        opacity: 1,
        duration: 1,
        delay: 3,
        ease: "power4.out",
    }
);

searchInput.addEventListener("focus", (e) => {
    gsap.to(containerSearch, {
        y: -400,
        duration: 1,
        scale: 1.1,
        ease: "power4.out",
    });

    e.target.addEventListener("keydown", (e) => {
        if (searchInput.value !== "" && e.key === "Enter") {
            fetch(`http://127.0.0.1:8000/search?query=${searchInput.value}`);
            window.location.href = `/search?query=${searchInput.value}`;
            getData();
        }
    });
});

searchInput.addEventListener("blur", () => {
    if (searchInput.value === "") {
        gsap.to(containerSearch, {
            y: 0,
            duration: 1,
            scale: 1,
            ease: "power4.out",
        });
    }
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
            duration: 3,
            ease: "power4.out",
            repeat: -1,
        }
    );

    setInterval(() => {
        animation.reversed(!animation.reversed());
    }, 1500);
});

const stars = document.querySelectorAll("#star");

stars.forEach((star, index) => {
    gsap.fromTo(
        star,
        {
            scale: 0,
        },
        {
            scale: 1,
            duration: 3,
            delay: index * 0.2,
            repeatDelay: 2,
            repeat: Infinity,
            ease: "power4.in",
        }
    );
});

const paws = document.querySelectorAll("#paw");

paws.forEach((paw, index) => {
    gsap.fromTo(
        paw,
        {
            scale: 0,
        },
        {
            scale: 1,
            duration: 3,
            delay: index * 0.4,
            repeatDelay: 2,
            repeat: Infinity,
            ease: "power4.in",
        }
    );
});

gsap.fromTo(
    "#customize",
    {
        y: 30,
        opacity: 0,
    },
    {
        y: 0,
        opacity: 1,
        duration: 1.5,
        delay: 1,
        ease: "power4.out",
    }
);

window.addEventListener("scroll", (e) => {
    const navbar = document.querySelector("#navbar");
    if (Math.round(window.scrollY) > 20) {
        navbar.classList.add("fixed", "top-0", "left-0", "right-0", "z-50", "bg-black/30", "]bg-blur-xl", "transition-all", "duration-300");
        navbar.classList.remove("mt-5");
    } else {
        navbar.classList.remove("fixed", "top-0", "left-0", "right-0", "z-50", "bg-black/30", "]bg-blur-xl", "transition-all", "duration-300");
        navbar.classList.add("mt-5");
    }
})

gsap.fromTo(
    "#option",
    {
        x: 30,
        opacity: 0,
    },
    {
        x: 0,
        opacity: 1,
        duration: 1.5,
        delay: 1,
        ease: "power4.out",
    }
);

const cards = document.querySelectorAll("#card");

cards.forEach((card, index) => {
    if (index % 2 !== 0) {
        gsap.fromTo(
            card,
            {
                x: 30,
                opacity: 0,
            },
            {
                x: 0,
                opacity: 1,
                duration: 1.5,
                ease: "power4.out",
                stagger: 0.5,
                delay: 2,
            }
        );
    } else {
        gsap.fromTo(
            card,
            {
                x: -30,
                opacity: 0,
            },
            {
                x: 0,
                opacity: 1,
                duration: 1.5,
                ease: "power4.out",
                stagger: 0.5,
                delay: 2,
            }
        );
    }
});

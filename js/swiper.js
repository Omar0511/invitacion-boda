const swiper = new Swiper(
    ".mySwiper",
    {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 15,
            strech: 0,
            depth: 300,
            modifier: 10,
            slideShadows: true,
        },
        loop: true,
    }
);
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

searchBtn.addEventListener("click", () => {
    // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
    }
}
let count = 0;
//if add to cart btn clicked
$(".cart-btn").on("click", function () {
    let cart = $(".cart-nav");
    // find the img of that card which button is clicked by user
    let imgtodrag = $(this)
        .parent(".buttons")
        .parent(".content")
        .parent(".card")
        .find("img")
        .eq(0);
    if (imgtodrag) {
        // duplicate the img
        var imgclone = imgtodrag
            .clone()
            .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left,
            })
            .css({
                opacity: "0.8",
                position: "absolute",
                height: "150px",
                width: "150px",
                "z-index": "100",
            })
            .appendTo($("body"))
            .animate(
                {
                    top: cart.offset().top + 20,
                    left: cart.offset().left + 30,
                    width: 75,
                    height: 75,
                },
                1000,
                "easeInOutExpo"
            );

        setTimeout(function () {
            count++;
            $(".cart-nav .item-count").text(count);
        }, 1500);

        imgclone.animate(
            {
                width: 0,
                height: 0,
            },
            function () {
                $(this).detach();
            }
        );
    }
});
let circle = document.querySelector(".color-option");
circle.addEventListener("click", (e) => {
    let target = e.target;
    if (target.classList.contains("circle")) {
        circle.querySelector(".active").classList.remove("active");
        target.classList.add("active");
        document
            .querySelector(".main-images .active")
            .classList.remove("active");
        document
            .querySelector(`.main-images .${target.id}`)
            .classList.add("active");
    }
});
var swiper = new Swiper(".slide-container", {
    slidesPerView: 4,
    spaceBetween: 20,
    sliderPerGroup: 4,
    loop: true,
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1000: {
            slidesPerView: 4,
        },
    },
});

var swiper1 = new Swiper(".swiper1", { spaceBetween: 30, pagination: { el: ".swiper-pagination1", clickable: true } });
var swiper2 = new Swiper(".swiper2", {
    spaceBetween: 30,
    loop: true,
    pagination: { el: ".swiper-pagination2", clickable: true },
    breakpoints: { 640: { slidesPerView: 2, spaceBetween: 20 }, 768: { slidesPerView: 4, spaceBetween: 40 }, 1024: { slidesPerView: 5, spaceBetween: 50 } },
});
var swiper3 = new Swiper(".swiper3", { spaceBetween: 30, pagination: { el: ".swiper-pagination3", clickable: true } });
var swiper4 = new Swiper(".swiper4", { spaceBetween: 30, pagination: { el: ".swiper-pagination4", clickable: true } });
var swiper5 = new Swiper(".swiper5", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: { el: ".swiper-pagination5", clickable: true },
    breakpoints: { 640: { slidesPerView: 1, spaceBetween: 20 }, 768: { slidesPerView: 2, spaceBetween: 40 }, 1024: { slidesPerView: 3, spaceBetween: 50 } },
});
$(".menuicon").click(function () {
    $(".sidemenu").toggleClass("d-flex");
});
$(".subcatbtn").click(function () {
    $(this).parent().find(".compreadmore").slideToggle();
    if ($(this).text() == "View More") {
        $(this).text("View Less");
    } else {
        $(this).text("View More");
    }
});
$(".js-select2").select2({ closeOnSelect: false, placeholder: "Placeholder", allowHtml: true, allowClear: true, tags: true });
$("#mobile_code").intlTelInput({ initialCountry: "in", separateDialCode: true });
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

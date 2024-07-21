const cartLink = document.querySelector(".cart_link");
const paymentLink = document.querySelector(".payment_link");
const completeLink = document.querySelector(".complete_link");

function updateTextShadow() {
    const currentPage = window.location.pathname;

    if (currentPage.includes("/Cart/ShowBill")) {

        completeLink.style.textShadow = "0 0 5px #04ed0475, 0 0 10px #04ed0475, 0 0 15px #04ed0475";
        cartLink.style.textShadow = "none";
        paymentLink.style.textShadow = "none";

    } else if (currentPage.includes("/Cart/updatesCartAndPay")) {

        paymentLink.style.textShadow = "0 0 5px #04ed0475, 0 0 10px #04ed0475, 0 0 15px #04ed0475";
        cartLink.style.textShadow = "none";
        completeLink.style.textShadow = "none"; 

    } else if (currentPage.includes("/Cart")) {

        cartLink.style.textShadow = "0 0 5px #04ed0475, 0 0 10px #04ed0475, 0 0 15px #04ed0475";
        paymentLink.style.textShadow = "none";
        completeLink.style.textShadow = "none"; 

    }
}

window.addEventListener("DOMContentLoaded", updateTextShadow);
window.addEventListener("load", updateTextShadow);

function preventDefaultAction(event) {
    event.preventDefault();
}

paymentLink.addEventListener("click", preventDefaultAction);
const cartLink = document.querySelector(".cart_link");
const paymentLink = document.querySelector(".payment_link");
const completeLink = document.querySelector(".complete_link");

function updateTextShadow() {
    const currentPage = window.location.pathname;

    if (currentPage.includes("/Cart/ShowBill")) {

        completeLink.style.textShadow = "0 0 5px #ed040474, 0 0 10px #ed040474, 0 0 15px #ed040474";

        cartLink.style.textShadow = "none";
        paymentLink.style.textShadow = "none";

    } else if (currentPage.includes("/Cart/updatesCartAndPay")) {

        paymentLink.style.textShadow = "0 0 5px #ed040474, 0 0 10px #ed040474, 0 0 15px #ed040474";
        cartLink.style.textShadow = "none";
        completeLink.style.textShadow = "none"; 

    } else if (currentPage.includes("/Cart")) {

        cartLink.style.textShadow = "0 0 5px #ed040474, 0 0 10px #ed040474, 0 0 15px #ed040474";
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
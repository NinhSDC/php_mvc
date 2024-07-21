document.addEventListener("DOMContentLoaded", function () {
    const triggerLink = document.querySelector('.trigger');
    triggerLink.addEventListener('click', function (event) {
        event.preventDefault();
    });
});
const trigger = document.querySelector("menu > .trigger");
trigger.addEventListener('click', (e) => {
    e.currentTarget.parentElement.classList.toggle("open");
});
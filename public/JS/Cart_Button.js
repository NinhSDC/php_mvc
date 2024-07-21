document.querySelectorAll(".bt-add-to-cart").forEach((button) =>
    button.addEventListener("click", (e) => {
        if (!button.classList.contains("loading")) {
            button.classList.add("loading");
            setTimeout(() => button.classList.remove("loading"), 2200);
        }
        e.preventDefault();
    })
);
const listItems = document.querySelectorAll(".hoverfa-fade");

listItems.forEach(function(listItem) {
    const icon = listItem.querySelector("i");

    listItem.addEventListener("mouseover", function() {
        icon.classList.add("fa-fade");
    });

    listItem.addEventListener("mouseout", function() {
        icon.classList.remove("fa-fade");
    });
});
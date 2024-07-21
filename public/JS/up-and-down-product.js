function tru(button) {
    var inputQuantity = button.nextElementSibling;
    var currentQuantity = parseInt(inputQuantity.value);
    if (currentQuantity > 0) {
        inputQuantity.value = currentQuantity - 1;
    }
}

function cong(button) {
    var inputQuantity = button.previousElementSibling;
    var currentQuantity = parseInt(inputQuantity.value);
    inputQuantity.value = currentQuantity + 1;
}

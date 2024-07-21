var contentElements = document.querySelectorAll('.ContentKeySorted_By');

contentElements.forEach(function (element) {
    element.addEventListener('click', function () {
        contentElements.forEach(function (el) {
            el.classList.remove('Custom-ContentKeySorted_By');
        });

        this.classList.add('Custom-ContentKeySorted_By');
    });
});
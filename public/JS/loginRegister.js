window.addEventListener("load", function () {
    const loginForm = document.querySelector(".login-form");
    const showPasswordIcon = loginForm && loginForm.querySelector(".show-password");
    const inputPassword = loginForm && loginForm.querySelector('input[type="password"]');
    
    if (showPasswordIcon && inputPassword) {
        showPasswordIcon.addEventListener("click", function () {
            const inputPasswordType = inputPassword.getAttribute("type");
            inputPasswordType === "password"
                ? inputPassword.setAttribute("type", "text")
                : inputPassword.setAttribute("type", "password");
        });
    }
});

{
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const btnLogin = $(".btn-form__login");
    const btnRegister = $(".btn-form__register");
    const formLogin = $(".form-login");
    const formRegister = $(".form-register");
    btnLogin.addEventListener("click", () => {
        formLogin.style.display = "block";
        formRegister.style.display = "none";
    });
    btnRegister.addEventListener("click", () => {
        formLogin.style.display = "none";
        formRegister.style.display = "block";
    });
}

// $$(".auth-form_group").onsubmit = (e) => {
//     console.log(1);
// };

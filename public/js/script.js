
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector("nav");
    const menuIcon = document.querySelector("input[type='checkbox']");

    menuIcon.addEventListener('click', () => {
        if (menuIcon.checked) {
            nav.classList.add("respon-nav");
        } else {
            nav.classList.remove("respon-nav");
        }
    }); 
});





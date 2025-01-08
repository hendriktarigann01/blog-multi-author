import './bootstrap';
import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/solid';


// navigation mobile
document.addEventListener("DOMContentLoaded", () => {
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");
    const navigation = document.getElementById("navigation");

    menuIcon.addEventListener("click", () => {
        menuIcon.classList.add("hidden");
        closeIcon.classList.remove("hidden");
        navigation.classList.add("visible");
        navigation.classList.remove("hidden");
    });

    closeIcon.addEventListener("click", () => {
        closeIcon.classList.add("hidden");
        menuIcon.classList.remove("hidden");
        navigation.classList.remove("visible");
        navigation.classList.add("hidden");
    });
});


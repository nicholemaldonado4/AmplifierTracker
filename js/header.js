const toggle = document.querySelector(".toggle");
const navList = document.querySelector(".nav_bar_list");
const submenu = document.querySelector(".has_submenu");

function showToggleMenu() {
    if (!navList.classList.contains("active")) {
        navList.classList.add("active");
    }
    
}

function hideToggleMenu() {
    if (navList.classList.contains("active")) {
        navList.classList.remove("active");
    }
    
}

function toggleSubmenu() {
    if (this.classList.contains("submenu_active")) {
        this.classList.remove("submenu_active");
    }
    else {
        this.classList.add("submenu_active");
    }
}

toggle.addEventListener("mouseenter", showToggleMenu, false);
navList.addEventListener("mouseleave", hideToggleMenu, false);
submenu.addEventListener("click", toggleSubmenu, false);

$(document).ready(function() {
    $("#logOutBtn").click(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        // Perform ajax/async http request.
        $.ajax({
            type: "POST",
            url: "../logout.php",
            data: $(this).serialize(),
            success: function(data) {
                window.location.replace("/");
            }
        });
    });
});
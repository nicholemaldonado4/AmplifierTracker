const toggle = document.querySelector(".toggle");
const navList = document.querySelector(".nav_bar_list");
const modal = document.querySelector(".modal");
const loginBtn = document.getElementById("loginBtn");
const submenu = document.querySelector(".has_submenu");


function toggleMenu() {
    if (navList.classList.contains("active")) {
        navList.classList.remove("active");
    }
    else {
//        alert(signInBtn.classList);
//        console.log("a");
        navList.classList.add("active");
//        if (signInBtn.classList.contains("hide")) {
//            alert("here");
//            signInBtn.classList.remove("active");
//        }
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

function showLoginModal() {
    if (navList.classList.contains("active")) {
        navList.classList.remove("active");
    }
    modal.style.display = "block";
}

function hideLoginModal() {
    modal.style.display = "none";
    if (submenu.classList.contains("hide")) {
        submenu.classList.remove("hide");
    }
    loginBtn.style.display = "none";
}

toggle.addEventListener("click", toggleMenu, false);
loginBtn.addEventListener("click", showLoginModal, false);
submenu.addEventListener("click", toggleSubmenu, false);

function setToLoggedOut() {
    if (loginBtn.classList.contains("hide")) {
        loginBtn.classList.remove("hide");
    }
    if (!submenu.classList.contains("hide")) {
        submenu.classList.add("hide");
    }
}

$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        // Perform ajax/async http request.
        $.ajax({
            type: "POST",
            url: "../submission.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
//                    hideLoginModal();
                    window.location.replace("index.php")
                }
            }
        });
    });
    $("#logOutBtn").click(function(e) {
        alert("button clicked");
        // Prevent event action of going to same page.
        e.preventDefault();
        // Perform ajax/async http request.
        $.ajax({
            type: "POST",
            url: "../logout.php",
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                setToLoggedOut();
            }
        });
    });
});
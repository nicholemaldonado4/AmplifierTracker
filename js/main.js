//const toggle = document.querySelector(".toggle");
//const navList = document.querySelector(".nav_bar_list");
const modal = document.querySelector(".modal");
const loginBtn = document.getElementById("loginBtn");
//const submenu = document.querySelector(".has_submenu");
const signUpTab = document.getElementById("signup-tab");
const loginTab = document.getElementById("login-tab");
const signUpDiv = document.getElementById("signup-div");
const loginDiv = document.getElementById("login-div");
const closeBox = document.getElementById("close-box");


//function showToggleMenu() {
//    if (!navList.classList.contains("active")) {
//        navList.classList.add("active");
//    }
//    
//}
//
//function hideToggleMenu() {
//    if (navList.classList.contains("active")) {
//        navList.classList.remove("active");
//    }
//    
//}
//
//function toggleSubmenu() {
//    if (this.classList.contains("submenu_active")) {
//        this.classList.remove("submenu_active");
//    }
//    else {
//        this.classList.add("submenu_active");
//    }
//}

function showLoginModal() {
    if (navList.classList.contains("active")) {
        navList.classList.remove("active");
    }
    modal.style.display = "block";
}

function closeLoginModal() {
    modal.style.display = "none";
}

function hideLoginModal() {
    modal.style.display = "none";
    if (submenu.classList.contains("hide")) {
        submenu.classList.remove("hide");
    }
    loginBtn.style.display = "none";
}

function showLoginForm() {
    if (loginDiv.classList.contains("hide")) {
        loginDiv.classList.remove("hide");
    }
    if (!signUpDiv.classList.contains("hide")) {
        signUpDiv.classList.add("hide");
    }
    loginTab.classList.remove("tinted");
    signUpTab.classList.add("tinted");
}

function showSignUpForm() {
    if (signUpDiv.classList.contains("hide")) {
        signUpDiv.classList.remove("hide");
    }
    if (!loginDiv.classList.contains("hide")) {
        loginDiv.classList.add("hide");
    }
    loginTab.classList.add("tinted");
    signUpTab.classList.remove("tinted");
}

//toggle.addEventListener("mouseenter", showToggleMenu, false);
//navList.addEventListener("mouseleave", hideToggleMenu, false);
loginBtn.addEventListener("click", showLoginModal, false);
//submenu.addEventListener("click", toggleSubmenu, false);
loginTab.addEventListener("click", showLoginForm, false);
signUpTab.addEventListener("click", showSignUpForm, false);
closeBox.addEventListener("click", closeLoginModal, false);

//function setToLoggedOut() {
//    if (loginBtn.classList.contains("hide")) {
//        loginBtn.classList.remove("hide");
//    }
//    if (!submenu.classList.contains("hide")) {
//        submenu.classList.add("hide");
//    }
//}

$(document).ready(function() {
    
    
    $("#loginForm").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        // Perform ajax/async http request.
        $.ajax({
            type: "POST",
            url: "../login.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
//                    hideLoginModal();
                    window.location.replace("index.php");
                }
            }
        });
    });
    
    $("#signup-form").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        // Perform ajax/async http request.
        $.ajax({
            type: "POST",
            url: "../signup.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
//                    hideLoginModal();
                    window.location.replace("index.php");
                }
            }
        });
    });
    
//    $("#logOutBtn").click(function(e) {
//        alert("button clicked");
//        // Prevent event action of going to same page.
//        e.preventDefault();
//        // Perform ajax/async http request.
//        $.ajax({
//            type: "POST",
//            url: "../logout.php",
//            data: $(this).serialize(),
//            success: function(data) {
////                alert(data);
////                setToLoggedOut();
//                window.location.replace("index.php");
//            }
//        });
//    });
});
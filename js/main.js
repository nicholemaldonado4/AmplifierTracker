const modal = document.querySelector(".modal");
const loginBtn = document.getElementById("loginBtn");
const signUpTab = document.getElementById("signup-tab");
const loginTab = document.getElementById("login-tab");
const signUpDiv = document.getElementById("signup-div");
const loginDiv = document.getElementById("login-div");
const closeBox = document.getElementById("close-box");
const userErrors = document.querySelectorAll(".user-error");

function showLoginModal() {
    if (navList.classList.contains("active")) {
        navList.classList.remove("active");
    }
    modal.style.display = "block";
}

function closeLoginModal() {
    modal.style.display = "none";
    for (let msg of userErrors) {
      msg.innerHTML = "";
    }
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

loginBtn.addEventListener("click", showLoginModal, false);
loginTab.addEventListener("click", showLoginForm, false);
signUpTab.addEventListener("click", showSignUpForm, false);
closeBox.addEventListener("click", closeLoginModal, false);

$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../login.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                    userErrors[0].innerHTML = data;
                }
                else {
                    window.location.replace("index.php");
                }
            }
        });
    });
    
    $("#signup-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../signup.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   userErrors[1].innerHTML = data;
                }
                else {
                    window.location.replace("index.php");
                }
            }
        });
    });
});
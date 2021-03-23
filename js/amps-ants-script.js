//$(document).ready(function() {
//    $("#loc-form").submit(function(e) {
//        // Prevent event action of going to same page.
//        e.preventDefault();
//        alert("right here");
//        // Perform ajax/async http request.
////        $.ajax({
////            type: "POST",
////            url: "../submission.php",
////            data: $(this).serialize(),
////            success: function(data) {
////                if (data) {
////                   alert(data);
////                }
////                else {
//////                    hideLoginModal();
////                    window.location.replace("index.php")
////                }
////            }
////        });
//    });
//});

const searchBar = document.getElementById("search-bar");

function search() {
//    alert(searchBar.value.toLowerCase());
    let searchInput = searchBar.value.toLowerCase();
    let locations = document.querySelector(".loc-list").getElementsByTagName("li");
    for (let i = 0; i < locations.length; i++) {
        let inputLoc = locations[i].getElementsByTagName("input")[0];
        let containsSearch = inputLoc.value.toLowerCase().indexOf(searchInput);
        if (containsSearch > -1) {
            locations[i].style.display = "";
        }
        else {
            locations[i].style.display = "none"; 
            inputLoc.checked = false;
        }
        
    }
}

searchBar.addEventListener("keyup", search, false);
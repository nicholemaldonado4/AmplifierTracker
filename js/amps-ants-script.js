const searchBar = document.getElementById("search-bar");
const searchForm = document.getElementsByClassName("search-form")[0];

function search() {
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

function clickRadioBtn() {
    if (this.classList.length > 1) {
        let active = searchForm.getElementsByClassName("clicked-loc")[0];
        if (active != null && active != this) {
            active.classList.remove("clicked-loc");
        }
        document.getElementById("rec-" + this.classList.item(1)).click();
        this.classList.add("clicked-loc");
    }
}

searchBar.addEventListener("keyup", search, false);

$(document).ready(function() {
    $(".search-item").click(clickRadioBtn);   
});
const addBtn = document.getElementById("add-btn");
const addModal = document.querySelector(".add-modal");
const closeBox = document.getElementById("close-box");
const userError = document.querySelector(".user-error");

function clickRadioBtn() {
    if (this.classList.length > 1) {
        document.getElementById("rec-" + this.classList.item(1)).click();
        $("#loc-" + this.classList.item(1)).click();
    }
}

function showAddRecordModal() {
    addModal.style.display = "block";
}

function closeAddModal() {
    addModal.style.display = "none";
    userError.innerHTML = "";
}

addBtn.addEventListener("click", showAddRecordModal, false);
closeBox.addEventListener("click", closeAddModal, false);

$(document).ready(function() {
    $(".grid-item").click(clickRadioBtn);
    $(".dot-container").click(clickRadioBtn);

    $("#add-rec-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-record.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   userError.innerHTML = data;
                }
                else {
                    window.location.replace("display.php");
                }
            }
        });
    });
    
    $("#export-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "display-export.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
                    window.location.replace("display.php");
                }
            }
        });
    });
});
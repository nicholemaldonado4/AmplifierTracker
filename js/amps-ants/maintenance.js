const addBtn = document.getElementById("add-btn");
const addModal = document.querySelector(".add-modal");
const closeBox = document.getElementById("close-box");
const userError = document.querySelector(".user-error");

function clickRadioBtn() {
    if (this.classList.length > 1) {
        document.getElementById("log-" + this.classList.item(1)).click();
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
    
     $("#record-form").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "delete-maintenance.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
                    window.location.replace("maintenance-log.php");
                }
            }
        });
    });
    
    $("#add-maintenance-form").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-maintenance.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   userError.innerHTML = data;
                }
                else {
                    window.location.replace("maintenance-log.php");
                }
            }
        });
    });
});
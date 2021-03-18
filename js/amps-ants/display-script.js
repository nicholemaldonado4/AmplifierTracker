const addBtn = document.getElementById("add-btn");
const addModal = document.querySelector(".add-modal");
const closeBox = document.getElementById("close-box");

function clickRadioBtn() {
//    alert(this.classList);
    if (this.classList.length > 1) {

            document.getElementById("rec-" + this.classList.item(1)).click();
//            $("#rec-" + this.classList.item(1)).click();
            $("#loc-" + this.classList.item(1)).click();
        }
}

function showAddRecordModal() {
    addModal.style.display = "block";
}

function closeAddModal() {
    addModal.style.display = "none";
}

addBtn.addEventListener("click", showAddRecordModal, false);
closeBox.addEventListener("click", closeAddModal, false);

$(document).ready(function() {
    $(".grid-item").click(clickRadioBtn);
    
//    $(".dot-selector").click(clickRadioBtn);
    $(".dot-container").click(clickRadioBtn);
    
//    $(".dot-container").click(clickRadioBtn);
    
//     $("#record-form").submit(function(e) {
//        // Prevent event action of going to same page.
//        e.preventDefault();
//        $.ajax({
//            type: "POST",
//            url: "delete-record.php",
//            data: $(this).serialize(),
//            success: function(data) {
//                if (data) {
//                   alert(data);
//                }
//                else {
//                    window.location.replace("display.php");
//                }
//            }
//        });
//    });
    
    $("#add-rec-form").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-record.php",
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
    
    $("#export-form").submit(function(e) {
        // Prevent event action of going to same page.
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
    
//    $("#maintenance-btn").click(function(e) {
//        // Prevent event action of going to same page.
//        e.preventDefault();
//        var xhr = new XMLHttpRequest();
//        xhr.open("POST", "maintenance-log.php", true);
//        xhr.setRequestHeader('Content-Type', 'application/json');
//        xhr.send(JSON.stringify({
//            barcode: 
//         }));
//    });
});
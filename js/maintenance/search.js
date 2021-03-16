//const addBtn = document.getElementById("add-btn");
//const addModal = document.querySelector(".add-modal");
//
//function clickRadioBtn() {
//    if (this.classList.length > 1) {
//            $("#" + this.classList.item(1)).click();
//        }
//}
//
//function showAddRecordModal() {
//    addModal.style.display = "block";
//}
//
//addBtn.addEventListener("click", showAddRecordModal, false);

$(document).ready(function() {    
     $("#excel-form").submit(function(e) {
        // Prevent event action of going to same page.
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../php/excel-exporter.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data) {
                   alert(data);
                }
                else {
                    window.location.replace("search.php");
                }
            }
        });
    });
});
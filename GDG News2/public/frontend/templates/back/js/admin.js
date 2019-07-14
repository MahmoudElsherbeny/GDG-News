var deleteBtn = document.getElementsByClassName("deleteBtn");
var deleteMsg = document.getElementsById("deleteMsg");

for(var click = 0; click < deleteBtn.length; click++){
    deleteBtn[click].onclick = function() {
        deleteMsg.style.display = "block";
    }
}

var cancelDelet = document.getElementById("dCancel");
cancelDelet.onclick = function() {
    deleteMsg.style.display = "none";
}
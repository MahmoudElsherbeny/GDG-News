/*  mobile Menu  */
var mmb = document.getElementById("mobileMenuBtn"),
    mm = document.getElementById("mobileMenu");

mmb.onclick = function() {

    if(mm.style.display === "none") {
        mm.style.display = "block";
    }
    else {
        mm.style.display = "none";
    }

}
/*  ------------------------------------  */
/*
var fieldsLs = document.getElementsByClassName("lsChecked");

fieldsLs.onclick = function() {
    for(var check = 0; check < fieldsLs.length; check++) {
        fieldsLs[check].style.borderBottomColor = "#ED0606";
    }
}
*/

/*  ----------------------------------   */
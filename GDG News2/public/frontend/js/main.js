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

function setBorderColor(link) {
        link.style.borderBottomColor = '#ED0606';
}

/*  ----------------------------------   */
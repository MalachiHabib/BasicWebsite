function aboutUs() {
   document.getElementById("buttonOne").classList.toggle("show");
}

function info() {
   document.getElementById("buttonTwo").classList.toggle("show");
}

function shopBy() {
   document.getElementById("buttonThree").classList.toggle("show");
}

function Cart() {
  document.getElementById("buttonFour").classList.toggle("show");
}

 window.onclick = function(dropdown) {
   if (!dropdown.target.matches('.dropdownbtn')) {
     var ddcontent = document.getElementsByClassName("ddcontent");
     var i;
     for (i = 0; i < ddcontent.length; i++) {
       var cueDropdown = ddcontent[i];
       if (cueDropdown.classList.contains('show')) {
         cueDropdown.classList.remove('show');
       }
     }
   }
 }

 window.onclick = function(dropdown) {
  if (!dropdown.target.matches('.cartbtn')) {
    var ddcontent = document.getElementsByClassName(".ddcontent-cart");
    var i;
    for (i = 0; i < ddcontent.length; i++) {
      var cueDropdown = ddcontent[i];
      if (cueDropdown.classList.contains('show')) {
        cueDropdown.classList.remove('show');
      }
    }
  }
}

var scrollbutton = document.getElementById("scrollbtn");

function gobackupFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


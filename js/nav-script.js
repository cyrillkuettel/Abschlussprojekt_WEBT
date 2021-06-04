
/* die "responsive" class wird hingetan und wieder weggenommen. (Wenn der user auf die Navbar klickt)*/
function toggleNavigation() {
    var x = document.getElementById("navigation");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  } 
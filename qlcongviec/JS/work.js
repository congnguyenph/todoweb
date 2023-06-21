function openSection(evt, contactName) {
    var i;
    var x = document.getElementsByClassName("showsection");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace("active-link", "");
    }
    document.getElementById(contactName).style.display = "block";  
    evt.currentTarget.className += " active-link";
  }
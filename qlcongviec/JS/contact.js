var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
});

VanillaTilt.init(document.querySelectorAll(".tilt"), {
  max: 20,
  speed: 300,
  reverse: true,
});

//It also supports NodeList
VanillaTilt.init(document.querySelectorAll(".tilt"));

function openContact(evt, contactName) {
    var i;
    var x = document.getElementsByClassName("contact");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(contactName).style.display = "block";  
    evt.currentTarget.className += " active";
  }




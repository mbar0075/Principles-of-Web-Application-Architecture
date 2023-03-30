/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */

/*function DelHistory() {
  window.history.replaceState(null, null, window.location.href);
};*/

function navFunction() {
  var x = document.getElementById("myLinks");
  var y = document.getElementById("link-container");
  var light_blue = "rgb(92, 154, 209)";
  if (x.style.display === "block") {
    y.style.border = "black 0px solid";
    x.style.display = "none";
  } else {
    x.style.display = "block";
    y.style.background = light_blue;
    y.style.width = "50vw";
  }
};

function heartToggle() {
  var x = document.getElementById(arguments[0]);
  if (x.classList.contains("fa-heart-o")) {
    x.classList.remove("fa-heart-o");
    x.classList.add("fa-heart");
  } else if (x.classList.contains("fa-heart")) {
    x.classList.remove("fa-heart");
    x.classList.add("fa-heart-o");
  }
};

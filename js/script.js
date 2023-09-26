var paras = document.getElementsByClassName("description");
var pattern = /\s+/g;
for (var i = 0; i < paras.length; i++) {
  var text = paras[i].textContent;
  text = text.replace(pattern, " ");
  var show = text.substring(0, 20) + " ...";
  paras[i].textContent = show;
}

var items = document.querySelectorAll("table#category_products div.card-body");
for (var i = 0; i < items.length; i++) {
  items[i].onmouseover = function (e) {
    var item = e.target;
    item.document.querySelector(item);
  };
}
// function changeQty(event, action) {
//   var clicked = event.target;
//   if (action == "plus") {
//     var element = clicked.previousElementSibling;
//     var qty = Number(element.value);
//     qty += 1;
//     if (value >= 0) element.value = qty;
//   } else if (action == "minus") {
//     var element = clicked.nextElementSibling;
//     var qty = Number(element.value);
//     qty -= 1;
//     if (value >= 0) element.value = qty;
//   }
// }

// var plus_buttons = document.getElementsByClassName("plus");
// var minus_buttons = document.getElementsByClassName("minus");

// for (var i = 0; i < plus_buttons.length; i++) {
//   plus_buttons[i].addEventListener("click", function (e) {
//     changeQty(e, "plus");
//   });
//   minus_buttons[i].addEventListener("click", function (e) {
//     changeQty(e, "minus");
//   });
// }
// // Set the date and time for the countdown
// var countDownDate = new Date("July 1, 2023 00:00:00").getTime();

// // Update the countdown every second
// var x = setInterval(function() {

//   // Get the current date and time
//   var now = new Date().getTime();

//   // Calculate the remaining time
//   var distance = countDownDate - now;

//   // Calculate the days, hours, minutes, and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the countdown timer
//   document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";

//   // If the countdown is finished, display a message
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("countdown").innerHTML = "THE DISCOUNT IS EXPIRED!";
//   }
// }, 1000);

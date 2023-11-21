/*
  <guest/beranda>
  **Get the button (scroll-up) for botton Beranda page
*/
var mybutton = document.getElementById("myBtn");
// When the user scrolls down 1200px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function scrollToTop() {
  var position =
      document.body.scrollTop || document.documentElement.scrollTop;
  if (position) {
      window.scrollBy(0, -Math.max(1, Math.floor(position / 10)));
      scrollAnimation = setTimeout("scrollToTop()", 15);
  } else {
    clearTimeout(scrollAnimation);
  }
}
//-------------------------

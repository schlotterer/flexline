
document.addEventListener("DOMContentLoaded", function() {
    // grab an element
    var myElement = document.querySelector(".site-header.headroom");
    // construct an instance of Headroom, passing the element
    var headroom  = new Headroom(myElement);
    // initialise
    headroom.init();
});

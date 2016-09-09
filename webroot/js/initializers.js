
$(document).ready(function()
{
    $(".button-collapse").sideNav();
    $(".flash-message").click(function(){
      $(this).fadeOut("slow")
    });
});
function notification(message)
{
  var options = {
    body: message,
    icon: 'http://cornergeeks.com/wordpress/wp-content/uploads/2014/07/Polymer-logo.png'
  };
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }
  else if (Notification.permission === "granted") {
    var notification = new Notification("Nuevo mensaje!", options);
  }
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      if (permission === "granted") {
        var notification = new Notification("Nuevo mensaje!", options);
      }
    });
  }
}

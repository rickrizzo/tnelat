//Variables
var i = 1;
var images = ['whiteboard.jpg', 'typing.jpg', 'entrepreneur.jpg'];

//Timeout
setInterval(function() {
  console.log("CHANGE!");
  $("header").css('background-image',   'url(/tnelat/resources/' + images[i] + ')');
  i ++;
  if(i == images.length) { i = 0; }
}, 3000);
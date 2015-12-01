//Add Emojis
/* This should read from a JSON file and not print numbers...*/
$("#rating").append(function() {
  var html = '<ul>';
  for(var i = 0; i < 10; i++) {
    html += '<li><span class="emoji">' + i + '<p><input type="radio" name="emoji"></p></li>';
  }
  html += '</ul>';
  return html;
});
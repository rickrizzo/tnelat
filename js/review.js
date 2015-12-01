//Select Person
$("#skills").append("Coming");

//Add Emojis
$("#rating").append(function() {
  var html = '<ul>';
  $.getJSON("data/emoji.json", function(data) {
    for(var i = 0; i < 10; i++) {
      html += '<li><span class="emoji">' + data.emoji[i] + '<p><input type="radio" name="emoji"></p></li>';
    }
  });
  html += '</ul>';
  return html;
});
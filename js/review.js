//Select Person
$.getJSON('data/skills.json', function(data) {
  for(var i = 0; i < data.skills.length; i++) {
    $('#skills').append('<input type="checkbox" name="skill" value="' + data.skills[i] + '">' + data.skills[i]);
  }
});

//Add Emojis
$.getJSON('data/emoji.json', function(data) {
  for(var i = 0; i < data.emoji.length; i++) {
    //Append
    $('#rating ul').append('<li><span id="emoji' + i + '"class="emoji">' 
      + data.emoji[i] + '<p><input type="radio" name="emoji" value="' + data.emoji[i] + '"></p></li>');
  }
  $('#rating ul li').each(function(index) {
    $(this).click(function() {
      $('input:radio[value="' + data.emoji[index] + '"]').prop("checked", true);
    });
  })
});
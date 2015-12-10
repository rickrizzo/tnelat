//Add Skills
/*$.getJSON('/tnelat/data/skills.json', function(data) {
  for(var i = 0; i < data.skills.length; i++) {
    $('#skills').append('<input type="checkbox" name="skill" value="' + data.skills[i] + '">' + data.skills[i]);
  }
});*/

//Add Emojis
$.getJSON('/tnelat/data/emoji.json', function(data) {
  console.log('call');
  for(var i = 0; i < data.emoji.length; i++) {
    //Append
    $('#emoji_select ul').append(
      '<li class="emoji_item">' +
          '<span id="emoji' + i + '"class="emoji">'+ data.emoji[i] + '</span>' +
          '<input type="radio" class="emoji_select" name="emoji" value="' + i + '">' +
      '</li>'
    );
  }
  $('#rating ul li').each(function(index) {
    $(this).click(function() {
      $('input:radio[value="' + index + '"]').prop("checked", true);
    });
  })
});
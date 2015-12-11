//Add Emojis
$.getJSON('/tnelat/data/emoji.json', function(data) {
  for(var i = 1; i < data.emoji.length; i++) {
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
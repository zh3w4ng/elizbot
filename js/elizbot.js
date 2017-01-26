function delete_elizbot_cookie(name, path, domain) {
  //if (Get_Cookie(name))
    document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") +
                      ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
}

jQuery(document).ready(function($) {

  var elizbotreload=0

  if(elizbotreload==0){
    elizbotreload=1;
    $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());
  }


  $('.clearconversation').click(function(e){
    e.preventDefault();
   // document.cookie = 'ELIZBOT_CONVERSATION' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    delete_elizbot_cookie('ELIZBOT_CONVERSATION', "/","");
    $('#conversation').html('');
  });


  $('#elizbotform').submit(function(e) {
    e.preventDefault();
    user = $('#elizbotsay').val();
    var baseurl = $('#pluginbase').val();
    if (user == "") {
      return;
    }
    botname = "Bot";
    $('#conversation').append("<div class='response'>"+
                              "<div class='usersay'><span class='whosay'>You:</span>"+
                              "<span class='yourresponse'>" + user + "</span>"+
                              "</div>"+
                              "</div>");

    $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());
    formdata = $("#elizbotform").serialize();
    $('#elizbotsay').val('')
    $('#elizbotsay').focus();

    $.post(baseurl+'lib/chat.php', formdata, function(returnData) {
      var botsaid = "";
      botsaid = returnData;
      $('#conversation').append("<div class='response'>" +
                                "<div class='botsay'><span class='whosay'>Bot:</span>" +
                                "<span class='sayit'>" + botsaid + "</span></div></div>");
      $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
              $('#conversation').height());


      $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());

      return false;
     });
  });
});

function setwidth(){
  locationwidth = $('#location').width();
  $('#results').width(locationwidth+20);
}

$(document).ready(function(){
  setwidth();
  $(window).resize(function(){
    setwidth();
  });
  $('#location').keyup(function(){
    if($(this).val() == ''){
      $('#results').removeClass('sho');
    }
    else{
      $('#results').addClass('sho');
    }
  });
  $('#results p').click(function(){
    $('#location').val($(this).text());
    $('#results').removeClass('sho');
  });
});

// replace contents of page by element
function replaceWithAjax(elementName, ajaxLink, fadeTime)
{
    fadeTime = 100; // force fade time to default value
    $('#loader').fadeIn(100);
    $(elementName).fadeOut(fadeTime);
    $.get(ajaxLink)
      .error(function() {
        $('#loader').fadeOut(100);
        $(this).show();
        alert('Sorry. There was a problem with the Internet connection. Please try again.');
      })
      .success(function(data) {
        $(elementName).fadeOut(fadeTime, function() {
          $('#loader').fadeOut(100);
	  $(this).html(data).fadeIn(fadeTime);
	});
      });
}

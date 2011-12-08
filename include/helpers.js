// replace contents of page by element
function replaceWithAjax(elementName, ajaxLink, fadeTime)
{
    fadeTime = 100; // force fade time to default value
    $('#loader').fadeIn(100); // show load animation
    $(elementName).fadeOut(fadeTime); // fade out current page
    $.get(ajaxLink)
      .error(function() {
        $('#loader').hide();
        $(this).show();
        alert('Sorry. There was a problem with the Internet connection. Please try again.');
      })
      .success(function(data) {
        $(elementName).fadeOut(fadeTime, function() {
          $('#loader').fadeOut(100); // hide load animation
	  $(this).html(data).fadeIn(fadeTime); // show new page after changing its HTML
	});
      });
}

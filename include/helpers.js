// replace contents of page by element
function replaceWithAjax(elementName, ajaxLink, fadeTime)
{
    $.get(ajaxLink)
      .error(function() { alert('Sorry. There was an error. Please try again.'); })
      .success(function(data) {
        $(elementName).fadeOut(fadeTime, function() {
          $(this).html(data).fadeIn(fadeTime);
        });
      });
}

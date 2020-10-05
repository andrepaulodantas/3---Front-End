$(function() {
  $('li:contains("pine")').text('teste');
  $('li.hot').html(function() {
    return '<em>' + $(this).text() + '</em>';
  });
  $('li#one').remove();
});  
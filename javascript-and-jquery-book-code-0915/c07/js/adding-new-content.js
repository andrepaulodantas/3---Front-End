$(function() {
  $('ul').before('<p class="notice">Vamos adicionar</p>');
  $('li.hot').prepend('* ');
  var $newListItem = $('<li><em>Alguma</em> Coisa</li>');
  $('li:last').after($newListItem);
});
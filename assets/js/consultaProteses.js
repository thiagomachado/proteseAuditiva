$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var codigo = $(this).children('td:eq(0)').text();
  		window.location.href = "edicaoProtese/"+codigo;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

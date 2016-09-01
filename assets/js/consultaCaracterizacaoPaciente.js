$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var numero = $(this).children('td:eq(0)').text();
  		window.location.href = "/proteseAuditiva/index.php/edicaoCaracterizacao/"+numero;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

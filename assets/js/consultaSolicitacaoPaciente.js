$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var numero = $(this).children('td:eq(0)').text();
  		window.location.href = "/proteseAuditiva/index.php/edicaoSolicitacao/"+numero;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

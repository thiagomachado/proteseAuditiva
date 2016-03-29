$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var cpf = $(this).children('td:eq(0)').text();
  		window.location.href = "cadastroCaracterizacaoPaciente/"+cpf;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

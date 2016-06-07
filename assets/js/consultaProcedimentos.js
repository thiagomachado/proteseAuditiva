$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var id = $(this).children('td:eq(0)').children('input').val();
			window.location.href = "/proteseAuditiva/index.php/edicaoProcedimento/"+id;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

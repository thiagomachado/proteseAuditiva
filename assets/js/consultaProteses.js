$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var id = $(this).children('.id').val();
  		window.location.href = "/proteseAuditiva/index.php/edicaoProtese/"+id;
		})

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

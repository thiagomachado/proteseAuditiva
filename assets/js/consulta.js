$(document).ready(function()
{
	$('.tabelaResultado tr:gt(0)')
		.click(function()
    {
  		var cpf = $(this).children('td:eq(0)').text();
  		window.location.href = "edicaoPaciente/"+cpf;
		})

    // .click(function()
    // {
		// 	var check = $(this).children('td').children('input[type = checkbox]').prop('checked');
		// 	if(check)
    //   {
		// 		$(this).children('td').children('input[type = checkbox]').prop('checked', false);
		// 		$(this).removeClass('selecionado');
		// 	}
    //   else
    //   {
		// 		$(this).children('td').children('input[type = checkbox]').prop('checked', true);
		// 		$(this).addClass('selecionado');
		// 	}
		// })

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);

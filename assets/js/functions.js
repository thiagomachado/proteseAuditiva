function mostrarModal(idModal)
{
  $('#fundoModal').css("visibility", "visible");
  $(idModal).css("visibility", "visible");
}

function esconderModal(idModal)
{
  $('#fundoModal').css("visibility", "hidden");
  $(idModal).css("visibility", "hidden");
}

function mudarCidades(url)
{

  var estado_cod = $('#estado').val();
  $.ajax(
  {
    type: "POST",
    url: "/proteseAuditiva/index.php/municipios/"+estado_cod,

    success: function(municipios)
    {
      console.log(municipios.length)
      $("#municipio > option").remove();
      for(var i =0; i < municipios.length; i++)
      {

        var opt = $('<option />');
        opt.val(municipios[i].Mun_Cod);
        opt.text(municipios[i].Mun_Nome);
        $('#municipio').append(opt);
        mudarCodigoIBGE();
      }
    }
  });

}

function mudarCodigoIBGE()
{
  var municipio = $('#municipio').val();
  $('#codIBGE').val(municipio);
}

function calcularIdade()
{
  var data = $('#dataNascimento').val().split("-");
  var dataAtual = new Date;
  var ano = data[0];
  var mes = data[1];
  var dia = data[2];
  var idade;
  if(mes == dataAtual.getMonth()+1)
  {
    if(dia > dataAtual.getDate())
    {
      idade = idade = dataAtual.getFullYear() - ano -1;
    }
    else
    {
      idade = dataAtual.getFullYear() - ano ;
    }
  }
  if(mes > dataAtual.getMonth()+1)
  {
    idade = dataAtual.getFullYear() - ano -1;
  }
  if (mes < dataAtual.getMonth()+1)
  {
      idade = dataAtual.getFullYear() - ano;
  }
  $('#idade').val(idade);
}

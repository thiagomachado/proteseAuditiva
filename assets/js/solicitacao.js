function exibirAreaProteseImplante()
{
    switch($("input[name='implanteProtese']:checked").val())
    {
        case "nop":
            $("#linhaProtese").css("display", "none");
            $("#linhaImplante").css("display", "none");
            break;
        case "protese":
            $("#linhaProtese").css("display", "block");
            $("#linhaImplante").css("display", "none");
            break;
        case "implante":
            $("#linhaProtese").css("display", "none");
            $("#linhaImplante").css("display", "block");
            break;
    }
}

function mudarProteses()
{

    var classeProtese = $('#classeProtese').val();
    $.ajax(
        {
            type: "POST",
            url: "/proteseAuditiva/index.php/protesesPorClasse/"+classeProtese,

            success: function(proteses)
            {
                console.log(proteses);
                $("#proteses > option").remove();
                for(var i =0; i < proteses.length; i++)
                {

                    var opt = $('<option />');
                    opt.val(proteses[i].Prot_Id);
                    opt.text(proteses[i].Prot_Fabricante + " - "+ proteses[i].Prot_Nome);
                    $('#proteses').append(opt);

                }
            }
        });
}

function mudarImplantes()
{

    var classeImplante = $('#classeImplante').val();
    $.ajax(
        {
            type: "POST",
            url: "/proteseAuditiva/index.php/implantesPorClasse/"+classeImplante,

            success: function(implantes)
            {
                console.log(implantes);
                $("#implantes > option").remove();
                for(var i =0; i < implantes.length; i++)
                {

                    var opt = $('<option />');
                    opt.val(implantes[i].Impl_Id);
                    opt.text(implantes[i].Impl_Fabr + " - "+ implantes[i].Impl_Desc);
                    $('#implantes').append(opt);

                }
            }
        });
}
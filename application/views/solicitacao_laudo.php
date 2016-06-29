<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("solicitacao_edicao_data.php");
?>
<!DOCTYPE html>
<html>

  <head lang = "pt-br">
    <?php
    echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('assets/css/solicitacaoLaudo.css');
    ?>
  </head>
  <body>
    <div class="conteudo">
      <div class="areaFormulario">
        <div class="ministerioDaSaude"></div>
        <div class="sus"></div>
        <div class="cabecalho">
          <p>
            Autorização de Procedimentos Ambulatoriais
          <br/>Laudo de Solicitação/Autorização</p>
        </div>
        <fieldset class="secaoFormulario">
          <legend class="titulo">IDENTIFICAÇÃO DO ESTABELECIMENTO DE SAÚDE (SOLICITANTE)</legend>
          <table class="tabelaPDF">
            <tr>
              <td colspan="4">
                <fieldset class="campo">
                  <legend>NOME DO ESTABELECIMENTO DE SAÚDE SOLICITANTE:</legend>
                  <label>HOSPITAL UNIVERSITÁRIO CLEMENTINO FRAGA FILHO</label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>CNES:</legend>
                  <label>2280167</label>
                </fieldset>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">IDENTIFICAÇÃO DO PACIENTE</legend>
          <table class="tabelaPDF">
            <tr>
              <td colspan="3">
                <fieldset class="campo">
                  <legend>NOME:</legend>
                  <label><?php echo trim($paciente->Pc_Nome); ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>Nº DO PRONTUÁRIO:</legend>
                  <label><?php echo $paciente->Pc_NumProntuario; ?></label>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td>
                <fieldset class="campo">
                  <legend>CARTÃO NACIONAL DE SAÚDE(CNS):</legend>
                  <label><?php echo $paciente->Pc_CartaoSus; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>DATA DE NASCIMENTO:</legend>
                  <label><?php echo date("d/m/Y", strtotime($paciente->Pc_DtNascimento)); ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>SEXO:</legend>
                  <label><?php echo strtoupper($paciente->Pc_Sexo); ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>RAÇA/COR:</legend>
                  <label><?php echo ($cor->Cor_Descricao); ?></label>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td colspan="3">
                <fieldset class="campo">
                  <legend>NOME DA MÃE:</legend>
                  <label><?php echo $paciente->Pc_NomeMae; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>TELEFONE CELULAR:</legend>
                  <label><?php echo $telefone->Tel_Tel1; ?></label>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td colspan="3">
                <fieldset class="campo">
                  <legend>NOME DO PAI:</legend>
                  <label><?php echo $paciente->Pc_NomePai; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>TELEFONE DE CONTATO:</legend>
                  <label><?php echo $telefone->Tel_Tel2; ?></label>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td colspan="4">
                <fieldset class="campo">
                  <legend>ENDEREÇO:</legend>
                  <label><?php echo $endereco->End_Logradouro; ?></label>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td>
                <fieldset class="campo">
                  <legend>MUNICÍPIO:</legend>
                  <label><?php echo $municipios->Mun_Nome; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>CÓD. IBGE:</legend>
                  <label><?php echo $municipios->Mun_Cod; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>UF:</legend>
                  <label><?php echo $municipios->Mun_UF; ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>CEP:</legend>
                  <label><?php echo $endereco->End_CEP; ?></label>
                </fieldset>
              </td>
            </tr>

          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">PROCEDIMENTO SOLICITADO:</legend>
          <table>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>CÓDIGO DO PROCEDIMENTO</legend>
                    <label></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>SERVIÇO</legend>
                    <label></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>CLASS</legend>
                    <label></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>NOME DO PROCEDIMENTO PRINCIPAL</legend>
                    <label></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>QTDE</legend>
                    <label></label>
                  </fieldset>
                </td>
              </tr>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">PROCEDIMENTO(S) SECUNDÁRIO(S):</legend>
          <table>
            <?php
              foreach ($itensSolicitacao as $itemSolicitacao)
              {
                echo
                '
                  <tr>
                    <td>
                      <fieldset class="campo">
                        <legend>CÓDIGO - PROCEDIMENTO</legend>
                        <label>'.$dataProcedimentos[$itemSolicitacao->Isolic_item_id].'</label>
                      </fieldset>
                    </td>
                    <td>
                      <fieldset class="campo">
                        <legend>QTDE</legend>
                        <label>'.$itemSolicitacao->Isolic_quantidade.'</label>
                      </fieldset>
                    </td>
                  </tr>
                ';
              }
             ?>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">JUSTIFICATIVA DO(S) PROCEDIMENTO(S) SOLICITADO(S)</legend>
          <table>
            <tr>
              <td >
                <fieldset class="campo">
                  <legend>DESCRIÇÃO DO DIAGNÓSTICO</legend>
                  <label><?php echo $solicitacao->Solic_descricao; ?></label>
                </fieldset>
              </td>
              <td >
                <fieldset class="campo">
                  <legend>CID 10 PRINCIPAL</legend>
                  <label><?php echo $solicitacao->Solic_cid10principal; ?></label>
                </fieldset>
              </td>
              <td >
                <fieldset class="campo">
                  <legend>CID 10 SECUNDÁRIO</legend>
                  <label><?php echo $solicitacao->Solic_cid10sec; ?></label>
                </fieldset>
              </td>
              <td >
                <fieldset class="campo">
                  <legend>CID 10 CAUSAS ASSOCIADAS</legend>
                  <label><?php echo $solicitacao->Solic_cid10causas; ?></label>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <fieldset class="campo obs">
                  <legend>OBSERVAÇÕES</legend>
                  <label><?php echo $solicitacao->Solic_obs; ?></label>
                </fieldset>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">SOLICITAÇÃO</legend>
          <table>
            <tr>
              <td>
                <fieldset class="campo">
                  <legend>NOME DO PROFISSIONAL SOLCITANTE</legend>
                  <label><?php echo $profissional->Us_Nome ?></label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>DATA DA SOLICITAÇÃO</legend>
                  <label><?php echo date("d/m/Y", strtotime($solicitacao->Solic_data)); ?></label>
                </fieldset>
              </td>
              <td rowspan="2">
                <fieldset class="campoCarimbo">
                  <legend>ASSINATURA E CARIMBO</legend>
                  <label></label>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset class="campo">
                  <legend>CARTÃO NACIONAL DE SAÚDE DO PROFISSIONAL SOLICITANTE</legend>
                  <label></label>
                </fieldset>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">AUTORIZAÇÃO</legend>
          <table>
            <tr>
              <td>
                <fieldset class="campo">
                  <legend>NOME DO PROFISSIONAL AUTORIZADOR</legend>
                  <label></label>
                </fieldset>
              </td>
              <td class="tamanhoReduzido">
                <fieldset class="campo">
                  <legend>CÓD. ÓRGÃO EMISSOR</legend>
                  <label></label>
                </fieldset>
              </td>
              <td rowspan="2">
                <fieldset class="campoCarimbo">
                  <legend>Nº DA AUTORIZAÇÃO (APAC)</legend>
                  <label></label>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset class="campo">
                  <legend>CARTÃO NACIONAL DE SAÚDE DO PROFISSIONAL SOLICITANTE</legend>
                  <label></label>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td>
                <fieldset class="campo">
                  <legend>ASSINATURA E CARIMBO (Nº DO REGISTRO DO CONSELHO)</legend>
                  <label></label>
                </fieldset>
              </td>
              <td class="tamanhoReduzido">
                <fieldset class="campo">
                  <legend>DATA DA AUTORIZAÇÃO</legend>
                  <label>__/__/____</label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>PERÍODO DE VALIDADE DA APAC</legend>
                  <label>__/__/__ A __/__/__ </label>
                </fieldset>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset class="secaoFormulario">
          <legend class="titulo">IDENTIFICAÇÃO DO ESTABELECIMENTO DE SAÚDE (EXECUTANTE)</legend>
          <table>
            <tr>
              <td colspan="4">
                <fieldset class="campo">
                  <legend>NOME DO ESTABELECIMENTO DE SAÚDE EXECUTANTE:</legend>
                  <label>HOSPITAL UNIVERSITÁRIO CLEMENTINO FRAGA FILHO</label>
                </fieldset>
              </td>
              <td>
                <fieldset class="campo">
                  <legend>CNES:</legend>
                  <label>2280167</label>
                </fieldset>
              </td>
            </tr>
          </table>
        </fieldset>
      </div>
    </div>
  </body>
</html>

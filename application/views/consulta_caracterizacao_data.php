<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '32',
            'readonly'      => '',
            'maxlength'     => '100',
            'value'         => $paciente->Pc_Nome
    );

    $dataCPF = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '10',
            'readonly'      => '',
            'pattern'       => '\d{11}',
            'maxlength'     => '11',
            'title'         => 'Digite apenas números no CPF',
            'value'         => $paciente->Pc_CPF
    );

    $dataProntuario = array(
            'name'          => 'nProntuario',
            'id'            => 'nProntuario',
            'size'          => '10',
            'readonly'      => '',
            'maxlength'     => '20',
            'value'         => $paciente->Pc_NumProntuario
    );

    $dataDataNascimento = array(
            'type'          => 'date',
            'size'          => '12',
            'name'          => 'dataNascimento',
            'id'            => 'dataNascimento',
            'readonly'      => '',
            'value'         => $paciente->Pc_DtNascimento
    );
?>

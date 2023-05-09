<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Medico;
use Bruna\Hospital\Entidades\Paciente;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$pacienteId = $argv[1];
$medicoId = $argv[2];

$paciente = $gerenciamentoDeEntidade->find(Paciente::class, $pacienteId);
$medico = $gerenciamentoDeEntidade->find(Medico::class, $medicoId);

$paciente->marcaMedico($medico);
$gerenciamentoDeEntidade->flush();

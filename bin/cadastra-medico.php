<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Especialidade;
use Bruna\Hospital\Entidades\Medico;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$medicoId = $argv[1];
$especialidadeId = $argv[2];

$medico = $gerenciamentoDeEntidade->find(Medico::class, $medicoId);
$especialidade = $gerenciamentoDeEntidade->find(Especialidade::class, $especialidadeId);

$especialidade->cadastraMedico($medico);
$gerenciamentoDeEntidade->flush();

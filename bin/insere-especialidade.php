<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Especialidade;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$especialidade = new Especialidade($argv[1]);

$gerenciamentoDeEntidade->persist($especialidade);
$gerenciamentoDeEntidade->flush();
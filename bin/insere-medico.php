<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Medico;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$medico = new Medico($argv[1]);

$gerenciamentoDeEntidade->persist($medico);
$gerenciamentoDeEntidade->flush();
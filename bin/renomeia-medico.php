<?php

use Bruna\Hospital\Entidades\Especialidade;
use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;

require_once __DIR__ .  '/../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();
$especialidadeRepositorio = $gerenciamentoDeEntidade->getRepository(Especialidade::class);

$medico = $especialidadeRepositorio->find($argv[1]);

$medico->name = $argv[2];
var_dump($medico);

$gerenciamentoDeEntidade->flush(); 
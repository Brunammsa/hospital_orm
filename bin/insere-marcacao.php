<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Marcacao;
use Bruna\Hospital\Entidades\Paciente;


require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$marcacao = new Marcacao($argv[1]);

for ($i=2; $i < $argc; $i++) { 
    $medico->addPaciente(new Paciente($argv[$i]));
}
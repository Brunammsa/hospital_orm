<?php

use Bruna\Hospital\Entidades\Medico;
use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;

require_once __DIR__ .  '/../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();
$medicoRepositorio = $gerenciamentoDeEntidade->getRepository(Medico::class);

$medico = $medicoRepositorio->find($argv[1]);

if ($medico) {
    $medico->name = $argv[2];

    $gerenciamentoDeEntidade->flush();
} else {
    echo 'id de Médico não encontrado' . PHP_EOL;
}

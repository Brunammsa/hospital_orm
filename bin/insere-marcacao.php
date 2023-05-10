<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Marcacao;
use Bruna\Hospital\Entidades\Medico;
use Bruna\Hospital\Entidades\Paciente;


require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$repositorioPaciente = $gerenciamentoDeEntidade->getRepository(Paciente::class);
$repositorioMedico = $gerenciamentoDeEntidade->getRepository(Medico::class);
$repositorioMarcacao = $gerenciamentoDeEntidade->getRepository(Marcacao::class);

$dataEHoraString = $argv[1];
$formato = 'Y/m/d H:i';
$data = DateTime::createFromFormat($formato, $dataEHoraString);

$marcacaoBusca = $repositorioMarcacao->findOneBy(['date' => $data]);


if ($marcacaoBusca) {
    echo 'Horário já cadastrado' . PHP_EOL;
    exit;
}

$pacienteBusca = $repositorioPaciente->findOneBy(['name' => $argv[2]]);
$medicoBusca = $repositorioMedico->findOneBy(['name' => $argv[3]]);


if (!$pacienteBusca) {
    echo 'Paciente não cadastrado' . PHP_EOL;
    return;
}

if (!$medicoBusca) {
    echo 'Medico não cadastrado' . PHP_EOL;
}

$marcacao = new Marcacao($data);
$marcacao->setPaciente($pacienteBusca);
$marcacao->setMedico($medicoBusca);

$gerenciamentoDeEntidade->persist($marcacao);
$gerenciamentoDeEntidade->flush();
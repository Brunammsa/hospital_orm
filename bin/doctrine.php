<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

ConsoleRunner::run(
    new SingleManagerProvider($gerenciamentoDeEntidade)
);
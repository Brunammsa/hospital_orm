<?php

require 'vendor/autoload.php';

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;

$config = new PhpFile(__DIR__ . '/migrations.php');

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($gerenciamentoDeEntidade));
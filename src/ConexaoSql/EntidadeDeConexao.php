<?php

namespace Bruna\Hospital\ConexaoSql;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Dotenv\Dotenv;
use Doctrine\ORM\ORMSetup;

class EntidadeDeConexao
{
    public static function gerenciamentoDeConexao(): EntityManager
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');

        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => $_ENV["HOSTNAME"]
                . ';dbname='
                . $_ENV["DATABASE"],
            'user' => $_ENV['MYSQL_USER'],
            'password' => $_ENV['PASSWORD'],
        ];

        return EntityManager::create($connection, $config);
    }
}

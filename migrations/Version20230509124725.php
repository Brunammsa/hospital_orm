<?php

declare(strict_types=1);

namespace Bruna\Hospital\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230509124725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação de tabela modelo';
    }

    public function up(Schema $schema): void
    {
        /*
        Criando tabela manualmente
        
        $tabela = $schema->createTable('modelo');
        $tabela->addColumn('id', 'integer')->setAutoincrement(true);
        $tabela->addColumn('coluna_modelo', 'string');
        $tabela->setPrimaryKey(['id']);
        */
    }

    public function down(Schema $schema): void
    {
        /*
        $schema->dropTable('modelo');
        */
    }
}

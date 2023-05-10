<?php

declare(strict_types=1);

namespace Bruna\Hospital\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510154106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Especialidade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especialidade_medico (especialidade_id INT NOT NULL, medico_id INT NOT NULL, INDEX IDX_9D53DE723BA9BFA5 (especialidade_id), INDEX IDX_9D53DE72A7FB1C0C (medico_id), PRIMARY KEY(especialidade_id, medico_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Marcacao (id INT AUTO_INCREMENT NOT NULL, paciente_id INT DEFAULT NULL, medico_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_AE32D637310DAD4 (paciente_id), INDEX IDX_AE32D63A7FB1C0C (medico_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Medico (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Paciente (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente_medico (paciente_id INT NOT NULL, medico_id INT NOT NULL, INDEX IDX_4DCCCC137310DAD4 (paciente_id), INDEX IDX_4DCCCC13A7FB1C0C (medico_id), PRIMARY KEY(paciente_id, medico_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE especialidade_medico ADD CONSTRAINT FK_9D53DE723BA9BFA5 FOREIGN KEY (especialidade_id) REFERENCES Especialidade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE especialidade_medico ADD CONSTRAINT FK_9D53DE72A7FB1C0C FOREIGN KEY (medico_id) REFERENCES Medico (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Marcacao ADD CONSTRAINT FK_AE32D637310DAD4 FOREIGN KEY (paciente_id) REFERENCES Paciente (id)');
        $this->addSql('ALTER TABLE Marcacao ADD CONSTRAINT FK_AE32D63A7FB1C0C FOREIGN KEY (medico_id) REFERENCES Medico (id)');
        $this->addSql('ALTER TABLE paciente_medico ADD CONSTRAINT FK_4DCCCC137310DAD4 FOREIGN KEY (paciente_id) REFERENCES Paciente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paciente_medico ADD CONSTRAINT FK_4DCCCC13A7FB1C0C FOREIGN KEY (medico_id) REFERENCES Medico (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE especialidade_medico DROP FOREIGN KEY FK_9D53DE723BA9BFA5');
        $this->addSql('ALTER TABLE especialidade_medico DROP FOREIGN KEY FK_9D53DE72A7FB1C0C');
        $this->addSql('ALTER TABLE Marcacao DROP FOREIGN KEY FK_AE32D637310DAD4');
        $this->addSql('ALTER TABLE Marcacao DROP FOREIGN KEY FK_AE32D63A7FB1C0C');
        $this->addSql('ALTER TABLE paciente_medico DROP FOREIGN KEY FK_4DCCCC137310DAD4');
        $this->addSql('ALTER TABLE paciente_medico DROP FOREIGN KEY FK_4DCCCC13A7FB1C0C');
        $this->addSql('DROP TABLE Especialidade');
        $this->addSql('DROP TABLE especialidade_medico');
        $this->addSql('DROP TABLE Marcacao');
        $this->addSql('DROP TABLE Medico');
        $this->addSql('DROP TABLE Paciente');
        $this->addSql('DROP TABLE paciente_medico');
    }
}

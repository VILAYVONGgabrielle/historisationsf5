<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210501085938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, typevoie VARCHAR(45) NOT NULL, nomvoie VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp INT NOT NULL, createdat DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listejuridique (id INT AUTO_INCREMENT NOT NULL, libelles VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, siren INT NOT NULL, villeimmatriculation VARCHAR(255) NOT NULL, dateimmatriculation DATE NOT NULL, capital INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE listejuridique');
        $this->addSql('DROP TABLE societes');
    }
}

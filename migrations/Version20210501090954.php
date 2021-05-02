<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210501090954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresses ADD societe_id INT NOT NULL');
        $this->addSql('ALTER TABLE adresses ADD CONSTRAINT FK_EF192552FCF77503 FOREIGN KEY (societe_id) REFERENCES societes (id)');
        $this->addSql('CREATE INDEX IDX_EF192552FCF77503 ON adresses (societe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresses DROP FOREIGN KEY FK_EF192552FCF77503');
        $this->addSql('DROP INDEX IDX_EF192552FCF77503 ON adresses');
        $this->addSql('ALTER TABLE adresses DROP societe_id');
    }
}

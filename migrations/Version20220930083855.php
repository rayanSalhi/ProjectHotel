<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930083855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre ADD categories_id INT NOT NULL, ADD vues VARCHAR(255) NOT NULL, ADD occupation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FFA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FFA21214B7 ON chambre (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FFA21214B7');
        $this->addSql('DROP INDEX IDX_C509E4FFA21214B7 ON chambre');
        $this->addSql('ALTER TABLE chambre DROP categories_id, DROP vues, DROP occupation');
    }
}

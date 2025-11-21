<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251103173700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE best_sellers (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, produit1 VARCHAR(255) NOT NULL, produit2 VARCHAR(255) NOT NULL, produit3 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE type_produit_tag (type_produit_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_924176B1237A8DE (type_produit_id), INDEX IDX_924176BBAD26311 (tag_id), PRIMARY KEY(type_produit_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176B1237A8DE FOREIGN KEY (type_produit_id) REFERENCES type_produit (id) ON DELETE CASCADE');
        //$this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176BBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        //$this->addSql('ALTER TABLE type_produit DROP FOREIGN KEY FK_29A5EC273797863B');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176B1237A8DE');
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176BBAD26311');
        $this->addSql('DROP TABLE best_sellers');
        $this->addSql('DROP TABLE type_produit_tag');
    }
}

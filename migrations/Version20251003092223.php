<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251003092223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produit_tag');
        $this->addSql('ALTER TABLE type_produit ADD illustration VARCHAR(255) NOT NULL, DROP date_achat, DROP dlc, DROP num_lot');
        $this->addSql('ALTER TABLE type_produit RENAME INDEX idx_29a5ec273797863b TO IDX_18483D23797863B');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_tag (produit_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_423DC0FAF347EFB (produit_id), INDEX IDX_423DC0FABAD26311 (tag_id), PRIMARY KEY(produit_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE type_produit ADD date_achat DATE NOT NULL, ADD dlc DATE DEFAULT NULL, ADD num_lot VARCHAR(100) NOT NULL, DROP illustration');
        $this->addSql('ALTER TABLE type_produit RENAME INDEX idx_18483d23797863b TO IDX_29A5EC273797863B');
    }
}

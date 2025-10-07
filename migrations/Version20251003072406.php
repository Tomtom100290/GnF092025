<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251003072406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Étape 1 : Renommer les tables
        //$this->addSql('ALTER TABLE produit_tag DROP FOREIGN KEY FK_423DC0FABAD26311');
        //$this->addSql('ALTER TABLE produit_tag DROP FOREIGN KEY FK_423DC0FAF347EFB');
        //$this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273797863B');

        $this->addSql('ALTER TABLE produit RENAME TO type_produit');
        //$this->addSql('ALTER TABLE produit_tag RENAME TO type_produit_tag');

        // Étape 2 : Recréer les contraintes sur les nouvelles tables renommées
        $this->addSql('ALTER TABLE type_produit ADD CONSTRAINT FK_18483D23797863B FOREIGN KEY (fk_categorie_produit_id) REFERENCES categorie (id)');
        //$this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176B1237A8DE FOREIGN KEY (type_produit_id) REFERENCES type_produit (id) ON DELETE CASCADE');
        //$this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176BBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_tag (produit_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_423DC0FABAD26311 (tag_id), INDEX IDX_423DC0FAF347EFB (produit_id), PRIMARY KEY(produit_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, fk_categorie_produit_id INT DEFAULT NULL, libelle VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_achat DATE NOT NULL, dlc DATE DEFAULT NULL, num_lot VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_creation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', top_actif TINYINT(1) NOT NULL, slug VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_29A5EC273797863B (fk_categorie_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_tag ADD CONSTRAINT FK_423DC0FABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_tag ADD CONSTRAINT FK_423DC0FAF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273797863B FOREIGN KEY (fk_categorie_produit_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE type_produit DROP FOREIGN KEY FK_18483D23797863B');
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176B1237A8DE');
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176BBAD26311');
        $this->addSql('DROP TABLE type_produit');
        $this->addSql('DROP TABLE type_produit_tag');
    }
}

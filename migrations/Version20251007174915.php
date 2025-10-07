<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251007174915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //// $this->addSql('CREATE TABLE bibliotheque (id INT AUTO_INCREMENT NOT NULL, url_img VARCHAR(255) NOT NULL, alt VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, date_creation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', top_actif TINYINT(1) NOT NULL, slug VARCHAR(30) NOT NULL, code_categorie VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, tel1 VARCHAR(14) NOT NULL, tel2 VARCHAR(14) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, info_compl VARCHAR(255) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, date_creation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', top_actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, tel VARCHAR(14) NOT NULL, url_insta VARCHAR(255) DEFAULT NULL, url_facebook VARCHAR(255) DEFAULT NULL, info_supp VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, h1 VARCHAR(100) NOT NULL, h2 VARCHAR(255) NOT NULL, paragraphe LONGTEXT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE page_cadeau (id INT AUTO_INCREMENT NOT NULL, h1 VARCHAR(100) NOT NULL, h2 VARCHAR(255) NOT NULL, paragraphe LONGTEXT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE page_gourmandise (id INT AUTO_INCREMENT NOT NULL, h1 VARCHAR(100) NOT NULL, h2 VARCHAR(255) NOT NULL, paragraphe LONGTEXT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE papetterie (id INT AUTO_INCREMENT NOT NULL, h1 VARCHAR(100) NOT NULL, h2 VARCHAR(255) NOT NULL, paragraphe LONGTEXT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE slug (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, code_tag VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE type_produit (id INT AUTO_INCREMENT NOT NULL, fk_categorie_produit_id INT DEFAULT NULL, libelle VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', top_actif TINYINT(1) NOT NULL, slug VARCHAR(30) NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, illustration VARCHAR(255) DEFAULT NULL, INDEX IDX_18483D23797863B (fk_categorie_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE type_produit_tag (type_produit_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_924176B1237A8DE (type_produit_id), INDEX IDX_924176BBAD26311 (tag_id), PRIMARY KEY(type_produit_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE type_produit ADD CONSTRAINT FK_18483D23797863B FOREIGN KEY (fk_categorie_produit_id) REFERENCES categorie (id)');
        // $this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176B1237A8DE FOREIGN KEY (type_produit_id) REFERENCES type_produit (id) ON DELETE CASCADE');
        // $this->addSql('ALTER TABLE type_produit_tag ADD CONSTRAINT FK_924176BBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_produit DROP FOREIGN KEY FK_18483D23797863B');
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176B1237A8DE');
        $this->addSql('ALTER TABLE type_produit_tag DROP FOREIGN KEY FK_924176BBAD26311');
        $this->addSql('DROP TABLE bibliotheque');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE page_cadeau');
        $this->addSql('DROP TABLE page_gourmandise');
        $this->addSql('DROP TABLE papetterie');
        $this->addSql('DROP TABLE slug');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE type_produit');
        $this->addSql('DROP TABLE type_produit_tag');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

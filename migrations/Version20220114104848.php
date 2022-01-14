<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220114104848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commerce (id INT AUTO_INCREMENT NOT NULL, gerant_id INT DEFAULT NULL, proprietaire_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, numero INT DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement LONGTEXT DEFAULT NULL, postale INT DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone INT DEFAULT NULL, fax INT DEFAULT NULL, typologie VARCHAR(255) DEFAULT NULL, pmr TINYINT(1) DEFAULT NULL, INDEX IDX_BBF5FDF9A500A924 (gerant_id), INDEX IDX_BBF5FDF976C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptabilite (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, can1 DOUBLE PRECISION DEFAULT NULL, can2 DOUBLE PRECISION DEFAULT NULL, can3 DOUBLE PRECISION DEFAULT NULL, franchise TINYINT(1) DEFAULT NULL, employe INT DEFAULT NULL, superficie DOUBLE PRECISION DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A737A41BB09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dimanche (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_3E01BB56B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telfixe INT DEFAULT NULL, telport INT DEFAULT NULL, numero INT DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement LONGTEXT DEFAULT NULL, postale INT DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, datecrea DATETIME DEFAULT NULL, raisonsociale VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, siret INT DEFAULT NULL, siren INT DEFAULT NULL, UNIQUE INDEX UNIQ_29791883B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeudi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_7E9D4224B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lundi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_B1B7AC8AB09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mardi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_46901FE6B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mercredi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_D5EFBE95B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telfixe INT DEFAULT NULL, telport INT DEFAULT NULL, numero INT DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement LONGTEXT DEFAULT NULL, postale INT DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE samedi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_2A89D17BB09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendredi (id INT AUTO_INCREMENT NOT NULL, commerce_id INT NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL, UNIQUE INDEX UNIQ_320A8D18B09114B7 (commerce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commerce ADD CONSTRAINT FK_BBF5FDF9A500A924 FOREIGN KEY (gerant_id) REFERENCES gerant (id)');
        $this->addSql('ALTER TABLE commerce ADD CONSTRAINT FK_BBF5FDF976C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE comptabilite ADD CONSTRAINT FK_A737A41BB09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE dimanche ADD CONSTRAINT FK_3E01BB56B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE jeudi ADD CONSTRAINT FK_7E9D4224B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE lundi ADD CONSTRAINT FK_B1B7AC8AB09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE mardi ADD CONSTRAINT FK_46901FE6B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE mercredi ADD CONSTRAINT FK_D5EFBE95B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE samedi ADD CONSTRAINT FK_2A89D17BB09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE vendredi ADD CONSTRAINT FK_320A8D18B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptabilite DROP FOREIGN KEY FK_A737A41BB09114B7');
        $this->addSql('ALTER TABLE dimanche DROP FOREIGN KEY FK_3E01BB56B09114B7');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883B09114B7');
        $this->addSql('ALTER TABLE jeudi DROP FOREIGN KEY FK_7E9D4224B09114B7');
        $this->addSql('ALTER TABLE lundi DROP FOREIGN KEY FK_B1B7AC8AB09114B7');
        $this->addSql('ALTER TABLE mardi DROP FOREIGN KEY FK_46901FE6B09114B7');
        $this->addSql('ALTER TABLE mercredi DROP FOREIGN KEY FK_D5EFBE95B09114B7');
        $this->addSql('ALTER TABLE samedi DROP FOREIGN KEY FK_2A89D17BB09114B7');
        $this->addSql('ALTER TABLE vendredi DROP FOREIGN KEY FK_320A8D18B09114B7');
        $this->addSql('ALTER TABLE commerce DROP FOREIGN KEY FK_BBF5FDF9A500A924');
        $this->addSql('ALTER TABLE commerce DROP FOREIGN KEY FK_BBF5FDF976C50E4A');
        $this->addSql('DROP TABLE commerce');
        $this->addSql('DROP TABLE comptabilite');
        $this->addSql('DROP TABLE dimanche');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE jeudi');
        $this->addSql('DROP TABLE lundi');
        $this->addSql('DROP TABLE mardi');
        $this->addSql('DROP TABLE mercredi');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE samedi');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vendredi');
    }
}

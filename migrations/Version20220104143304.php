<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104143304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commerce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, gerant_id INTEGER DEFAULT NULL, proprietaire_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, numero INTEGER DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement CLOB DEFAULT NULL, postale INTEGER DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone INTEGER DEFAULT NULL, fax INTEGER DEFAULT NULL, typologie VARCHAR(255) DEFAULT NULL, pmr BOOLEAN DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_BBF5FDF9A500A924 ON commerce (gerant_id)');
        $this->addSql('CREATE INDEX IDX_BBF5FDF976C50E4A ON commerce (proprietaire_id)');
        $this->addSql('CREATE TABLE comptabilite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, can1 DOUBLE PRECISION DEFAULT NULL, can2 DOUBLE PRECISION DEFAULT NULL, can3 DOUBLE PRECISION DEFAULT NULL, franchise BOOLEAN DEFAULT NULL, employe INTEGER DEFAULT NULL, superficie DOUBLE PRECISION DEFAULT NULL, commentaire CLOB DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A737A41BB09114B7 ON comptabilite (commerce_id)');
        $this->addSql('CREATE TABLE dimanche (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3E01BB56B09114B7 ON dimanche (commerce_id)');
        $this->addSql('CREATE TABLE gerant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telfixe INTEGER DEFAULT NULL, telport INTEGER DEFAULT NULL, numero INTEGER DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement CLOB DEFAULT NULL, postale INTEGER DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE information (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, datecrea DATETIME DEFAULT NULL, raisonsociale VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, siret INTEGER DEFAULT NULL, siren INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29791883B09114B7 ON information (commerce_id)');
        $this->addSql('CREATE TABLE jeudi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E9D4224B09114B7 ON jeudi (commerce_id)');
        $this->addSql('CREATE TABLE lundi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B1B7AC8AB09114B7 ON lundi (commerce_id)');
        $this->addSql('CREATE TABLE mardi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_46901FE6B09114B7 ON mardi (commerce_id)');
        $this->addSql('CREATE TABLE mercredi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5EFBE95B09114B7 ON mercredi (commerce_id)');
        $this->addSql('CREATE TABLE proprietaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telfixe INTEGER DEFAULT NULL, telport INTEGER DEFAULT NULL, numero INTEGER DEFAULT NULL, bis VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, complement CLOB DEFAULT NULL, postale INTEGER DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE samedi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A89D17BB09114B7 ON samedi (commerce_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE vendredi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commerce_id INTEGER NOT NULL, ouverturematin TIME DEFAULT NULL, fermeturematin TIME DEFAULT NULL, ouvertureaprem TIME DEFAULT NULL, fermetureaprem TIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_320A8D18B09114B7 ON vendredi (commerce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
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

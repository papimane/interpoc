<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190914100240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, type_voie VARCHAR(100) NOT NULL, nom_voie VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse_societe (adresse_id INT NOT NULL, societe_id INT NOT NULL, INDEX IDX_B77B82224DE7DC5C (adresse_id), INDEX IDX_B77B8222FCF77503 (societe_id), PRIMARY KEY(adresse_id, societe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forme_juridique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, date DATETIME NOT NULL, type_crud VARCHAR(10) NOT NULL, id_adresse INT DEFAULT NULL, id_forme_juridique INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, capital NUMERIC(15, 3) DEFAULT NULL, INDEX IDX_EDBFD5ECFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, forme_juridique_id INT NOT NULL, nom VARCHAR(255) NOT NULL, siren INT NOT NULL, ville_immat VARCHAR(100) NOT NULL, date_immat DATETIME NOT NULL, capital NUMERIC(15, 3) NOT NULL, INDEX IDX_19653DBD9AEE68EB (forme_juridique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse_societe ADD CONSTRAINT FK_B77B82224DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adresse_societe ADD CONSTRAINT FK_B77B8222FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5ECFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD9AEE68EB FOREIGN KEY (forme_juridique_id) REFERENCES forme_juridique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresse_societe DROP FOREIGN KEY FK_B77B82224DE7DC5C');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD9AEE68EB');
        $this->addSql('ALTER TABLE adresse_societe DROP FOREIGN KEY FK_B77B8222FCF77503');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5ECFCF77503');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE adresse_societe');
        $this->addSql('DROP TABLE forme_juridique');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE societe');
    }
}

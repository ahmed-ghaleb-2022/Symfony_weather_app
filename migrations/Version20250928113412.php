<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250928113412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forecast (id INT AUTO_INCREMENT NOT NULL, location_id INT NOT NULL, date DATE NOT NULL, temperature_celsius INT NOT NULL, fl_temperature_celsius INT NOT NULL, pressure INT DEFAULT NULL, humidity INT DEFAULT NULL, wind_speed DOUBLE PRECISION DEFAULT NULL, wind_deg INT DEFAULT NULL, cloudiness INT DEFAULT NULL, icon VARCHAR(255) NOT NULL, INDEX IDX_2A9C784464D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forecast ADD CONSTRAINT FK_2A9C784464D218E FOREIGN KEY (location_id) REFERENCES location (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forecast DROP FOREIGN KEY FK_2A9C784464D218E');
        $this->addSql('DROP TABLE forecast');
    }
}

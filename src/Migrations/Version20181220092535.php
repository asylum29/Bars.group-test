<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181220092535 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ip_address (id INT AUTO_INCREMENT NOT NULL, ip VARCHAR(100) NOT NULL, country_code VARCHAR(100) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, region VARCHAR(100) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, country_rus VARCHAR(100) DEFAULT NULL, region_rus VARCHAR(100) DEFAULT NULL, city_rus VARCHAR(100) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, zip_code VARCHAR(100) DEFAULT NULL, time_zone VARCHAR(100) DEFAULT NULL, time_modified INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ip_address');
    }
}

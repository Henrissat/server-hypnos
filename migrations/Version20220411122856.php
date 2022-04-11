<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411122856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE galery_img (id INT AUTO_INCREMENT NOT NULL, rooms_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A0A614108E2368AB (rooms_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE galery_img ADD CONSTRAINT FK_A0A614108E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE gerant CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE room ADD capacity INT NOT NULL, ADD size INT NOT NULL, ADD bed INT NOT NULL, ADD quantity_rooms INT NOT NULL, ADD breaksfast VARCHAR(50) , ADD header_room VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE galery_img');
        $this->addSql('ALTER TABLE gerant CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE room DROP capacity, DROP size, DROP bed, DROP quantity_rooms, DROP breaksfast, DROP header_room');
    }
}

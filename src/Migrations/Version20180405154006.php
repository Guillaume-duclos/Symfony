<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405154006 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stop (id VARCHAR(32) NOT NULL, parent_id VARCHAR(32) DEFAULT NULL, name VARCHAR(128) NOT NULL, description LONGTEXT NOT NULL, latitude NUMERIC(10, 7) NOT NULL, longitude NUMERIC(10, 7) NOT NULL, location_type SMALLINT NOT NULL, is_wheelchair_boarding TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_B95616B6727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shapes (id INT AUTO_INCREMENT NOT NULL, shape_id INT NOT NULL, shape_pt_lat DOUBLE PRECISION NOT NULL, shape_pt_lon DOUBLE PRECISION NOT NULL, shape_pt_sequence INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop_time (id VARCHAR(32) NOT NULL, trip_id VARCHAR(32) DEFAULT NULL, stop_id VARCHAR(32) DEFAULT NULL, arrival TIME NOT NULL, departure TIME NOT NULL, stop_sequence SMALLINT NOT NULL, INDEX IDX_85725A5AA5BC2E0E (trip_id), INDEX IDX_85725A5A3902063D (stop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route (id VARCHAR(32) NOT NULL, short_name VARCHAR(128) NOT NULL, long_name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, color VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id VARCHAR(32) NOT NULL, route_id VARCHAR(32) DEFAULT NULL, headsign VARCHAR(128) NOT NULL, direction SMALLINT NOT NULL, is_wheelchair_accessible TINYINT(1) NOT NULL, INDEX IDX_7656F53B34ECB4E6 (route_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stop ADD CONSTRAINT FK_B95616B6727ACA70 FOREIGN KEY (parent_id) REFERENCES stop (id)');
        $this->addSql('ALTER TABLE stop_time ADD CONSTRAINT FK_85725A5AA5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE stop_time ADD CONSTRAINT FK_85725A5A3902063D FOREIGN KEY (stop_id) REFERENCES stop (id)');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53B34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stop DROP FOREIGN KEY FK_B95616B6727ACA70');
        $this->addSql('ALTER TABLE stop_time DROP FOREIGN KEY FK_85725A5A3902063D');
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53B34ECB4E6');
        $this->addSql('ALTER TABLE stop_time DROP FOREIGN KEY FK_85725A5AA5BC2E0E');
        $this->addSql('DROP TABLE stop');
        $this->addSql('DROP TABLE shapes');
        $this->addSql('DROP TABLE stop_time');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE trip');
    }
}

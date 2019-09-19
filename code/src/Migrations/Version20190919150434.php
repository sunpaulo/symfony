<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190919150434 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'User database is created';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (
            id INT AUTO_INCREMENT NOT NULL, 
            first_name VARCHAR(50) NOT NULL, 
            last_name VARCHAR(50) DEFAULT NULL, 
            email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, 
            login_at DATETIME DEFAULT NULL, 
            created_at DATETIME NOT NULL, 
            updated_at DATETIME NOT NULL, 
            deleted_at DATETIME DEFAULT NULL, 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
    }
}

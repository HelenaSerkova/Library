<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221222191644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, author VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, edition VARCHAR(255) NOT NULL, amount INT NOT NULL, onarms INT DEFAULT NULL, inholl INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reader (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birthday DATE NOT NULL, passport INT NOT NULL, telephone VARCHAR(15) NOT NULL, score INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issued_books DROP FOREIGN KEY books');
        $this->addSql('ALTER TABLE issued_books DROP FOREIGN KEY readers');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE readers');
        $this->addSql('DROP TABLE issued_books');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books (idbooks INT AUTO_INCREMENT NOT NULL, author VARCHAR(45) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, name VARCHAR(65) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, edition VARCHAR(45) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, amount INT NOT NULL, onarms INT DEFAULT NULL, inholl INT DEFAULT NULL, PRIMARY KEY(idbooks)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE readers (idreaders INT AUTO_INCREMENT NOT NULL, name VARCHAR(65) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, birthday DATE NOT NULL, passport INT NOT NULL, telephone VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, score INT DEFAULT NULL, PRIMARY KEY(idreaders)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE issued_books (idbooks INT NOT NULL, idreaders INT NOT NULL, issued_date DATE NOT NULL, validity DATE NOT NULL, return_date DATE NOT NULL, INDEX books_idx (idbooks), INDEX readers_idx (idreaders)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE issued_books ADD CONSTRAINT books FOREIGN KEY (idbooks) REFERENCES books (idbooks) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE issued_books ADD CONSTRAINT readers FOREIGN KEY (idreaders) REFERENCES readers (idreaders) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE reader');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

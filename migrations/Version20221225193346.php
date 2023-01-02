<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221225193346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issued_books ADD idbooks_id INT NOT NULL, ADD idreaders_id INT NOT NULL');
        $this->addSql('ALTER TABLE issued_books ADD CONSTRAINT FK_98B7BD81D70DE42D FOREIGN KEY (idbooks_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE issued_books ADD CONSTRAINT FK_98B7BD81927212C7 FOREIGN KEY (idreaders_id) REFERENCES reader (id)');
        $this->addSql('CREATE INDEX IDX_98B7BD81D70DE42D ON issued_books (idbooks_id)');
        $this->addSql('CREATE INDEX IDX_98B7BD81927212C7 ON issued_books (idreaders_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issued_books DROP FOREIGN KEY FK_98B7BD81D70DE42D');
        $this->addSql('ALTER TABLE issued_books DROP FOREIGN KEY FK_98B7BD81927212C7');
        $this->addSql('DROP INDEX IDX_98B7BD81D70DE42D ON issued_books');
        $this->addSql('DROP INDEX IDX_98B7BD81927212C7 ON issued_books');
        $this->addSql('ALTER TABLE issued_books DROP idbooks_id, DROP idreaders_id');
    }
}

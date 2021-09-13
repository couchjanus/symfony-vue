<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210910083720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD created_at DATETIME2(6) NOT NULL');
        $this->addSql('ALTER TABLE product ADD slug NVARCHAR(128) NOT NULL');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'product\', N\'COLUMN\', created_at');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD989D9B62 ON product (slug) WHERE slug IS NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'UNIQ_D34A04AD989D9B62\')
                            ALTER TABLE product DROP CONSTRAINT UNIQ_D34A04AD989D9B62
                        ELSE
                            DROP INDEX UNIQ_D34A04AD989D9B62 ON product
                    ');
        $this->addSql('ALTER TABLE product DROP COLUMN created_at');
        $this->addSql('ALTER TABLE product DROP COLUMN slug');
    }
}

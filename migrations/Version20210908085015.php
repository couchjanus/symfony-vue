<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908085015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT IDENTITY NOT NULL, name NVARCHAR(255) NOT NULL, description VARCHAR(MAX) NOT NULL, created_at DATETIME2(6), updated_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'brand\', N\'COLUMN\', created_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'brand\', N\'COLUMN\', updated_at');
        $this->addSql('CREATE TABLE category (id INT IDENTITY NOT NULL, name NVARCHAR(20) NOT NULL, description NVARCHAR(255) NOT NULL, created_at DATETIME2(6), updated_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'category\', N\'COLUMN\', created_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'category\', N\'COLUMN\', updated_at');
        $this->addSql('CREATE TABLE product (id INT IDENTITY NOT NULL, brand_id INT NOT NULL, category_id INT NOT NULL, name NVARCHAR(255) NOT NULL, image_name NVARCHAR(255) NOT NULL, updated_at DATETIME2(6) NOT NULL, description VARCHAR(MAX) NOT NULL, price DOUBLE PRECISION NOT NULL, stock_quantity INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD44F5D008 ON product (brand_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'product\', N\'COLUMN\', updated_at');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
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
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE product');
    }
}

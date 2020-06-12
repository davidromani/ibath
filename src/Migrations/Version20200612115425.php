<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612115425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE setono_sylius_analytics__property (id INT AUTO_INCREMENT NOT NULL, trackingId VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_7B90A5EE6F76B6A7 (trackingId), INDEX idx_enabled (enabled), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setono_sylius_analytics__property_channels (property_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_43A09F79549213EC (property_id), INDEX IDX_43A09F7972F5A1AA (channel_id), PRIMARY KEY(property_id, channel_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE setono_sylius_analytics__property_channels ADD CONSTRAINT FK_43A09F79549213EC FOREIGN KEY (property_id) REFERENCES setono_sylius_analytics__property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE setono_sylius_analytics__property_channels ADD CONSTRAINT FK_43A09F7972F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE setono_sylius_analytics__property_channels DROP FOREIGN KEY FK_43A09F79549213EC');
        $this->addSql('DROP TABLE setono_sylius_analytics__property');
        $this->addSql('DROP TABLE setono_sylius_analytics__property_channels');
    }
}

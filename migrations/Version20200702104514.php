<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200702104514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_user DROP INDEX IDX_36DC1DAB4ADAD40B, ADD UNIQUE INDEX UNIQ_36DC1DAB4ADAD40B (province)');
        $this->addSql('ALTER TABLE data_user DROP INDEX IDX_36DC1DABA76ED395, ADD UNIQUE INDEX UNIQ_36DC1DABA76ED395 (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_user DROP INDEX UNIQ_36DC1DAB4ADAD40B, ADD INDEX IDX_36DC1DAB4ADAD40B (province)');
        $this->addSql('ALTER TABLE data_user DROP INDEX UNIQ_36DC1DABA76ED395, ADD INDEX IDX_36DC1DABA76ED395 (user_id)');
    }
}

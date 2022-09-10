<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220910225540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A48FDDAB70');
        $this->addSql('DROP INDEX IDX_7D3656A48FDDAB70 ON account');
        $this->addSql('ALTER TABLE account CHANGE owner_id_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A47E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7D3656A47E3C61F9 ON account (owner_id)');
        $this->addSql('ALTER TABLE categorie CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE libelle CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D49CB4726');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D8A3C7387');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DB193E41D');
        $this->addSql('DROP INDEX IDX_1981A66D49CB4726 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66D8A3C7387 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66DB193E41D ON operation');
        $this->addSql('ALTER TABLE operation ADD account_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL, ADD libelle_id INT DEFAULT NULL, DROP account_id_id, DROP categorie_id_id, DROP libelle_id_id');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D25DD318D FOREIGN KEY (libelle_id) REFERENCES libelle (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D9B6B5FBA ON operation (account_id)');
        $this->addSql('CREATE INDEX IDX_1981A66DBCF5E72D ON operation (categorie_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D25DD318D ON operation (libelle_id)');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671F49CB4726');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671F8A3C7387');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671FB193E41D');
        $this->addSql('DROP INDEX IDX_88C8671F49CB4726 ON prelevement');
        $this->addSql('DROP INDEX IDX_88C8671F8A3C7387 ON prelevement');
        $this->addSql('DROP INDEX IDX_88C8671FB193E41D ON prelevement');
        $this->addSql('ALTER TABLE prelevement ADD account_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL, ADD libelle_id INT DEFAULT NULL, DROP account_id_id, DROP categorie_id_id, DROP libelle_id_id');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671F9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671F25DD318D FOREIGN KEY (libelle_id) REFERENCES libelle (id)');
        $this->addSql('CREATE INDEX IDX_88C8671F9B6B5FBA ON prelevement (account_id)');
        $this->addSql('CREATE INDEX IDX_88C8671FBCF5E72D ON prelevement (categorie_id)');
        $this->addSql('CREATE INDEX IDX_88C8671F25DD318D ON prelevement (libelle_id)');
        $this->addSql('ALTER TABLE solde DROP FOREIGN KEY FK_6691836749CB4726');
        $this->addSql('DROP INDEX IDX_6691836749CB4726 ON solde');
        $this->addSql('ALTER TABLE solde CHANGE account_id_id account_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE solde ADD CONSTRAINT FK_669183679B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('CREATE INDEX IDX_669183679B6B5FBA ON solde (account_id)');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, CHANGE username username VARCHAR(180) NOT NULL, CHANGE firstname firstname VARCHAR(50) NOT NULL, CHANGE lastname lastname VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A47E3C61F9');
        $this->addSql('DROP INDEX IDX_7D3656A47E3C61F9 ON account');
        $this->addSql('ALTER TABLE account CHANGE owner_id owner_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A48FDDAB70 FOREIGN KEY (owner_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7D3656A48FDDAB70 ON account (owner_id_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user DROP roles, CHANGE username username VARCHAR(255) NOT NULL, CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE solde DROP FOREIGN KEY FK_669183679B6B5FBA');
        $this->addSql('DROP INDEX IDX_669183679B6B5FBA ON solde');
        $this->addSql('ALTER TABLE solde CHANGE account_id account_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE solde ADD CONSTRAINT FK_6691836749CB4726 FOREIGN KEY (account_id_id) REFERENCES account (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6691836749CB4726 ON solde (account_id_id)');
        $this->addSql('ALTER TABLE categorie CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671F9B6B5FBA');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671FBCF5E72D');
        $this->addSql('ALTER TABLE prelevement DROP FOREIGN KEY FK_88C8671F25DD318D');
        $this->addSql('DROP INDEX IDX_88C8671F9B6B5FBA ON prelevement');
        $this->addSql('DROP INDEX IDX_88C8671FBCF5E72D ON prelevement');
        $this->addSql('DROP INDEX IDX_88C8671F25DD318D ON prelevement');
        $this->addSql('ALTER TABLE prelevement ADD account_id_id INT DEFAULT NULL, ADD categorie_id_id INT DEFAULT NULL, ADD libelle_id_id INT DEFAULT NULL, DROP account_id, DROP categorie_id, DROP libelle_id');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671F49CB4726 FOREIGN KEY (account_id_id) REFERENCES account (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671F8A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prelevement ADD CONSTRAINT FK_88C8671FB193E41D FOREIGN KEY (libelle_id_id) REFERENCES libelle (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_88C8671F49CB4726 ON prelevement (account_id_id)');
        $this->addSql('CREATE INDEX IDX_88C8671F8A3C7387 ON prelevement (categorie_id_id)');
        $this->addSql('CREATE INDEX IDX_88C8671FB193E41D ON prelevement (libelle_id_id)');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D9B6B5FBA');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DBCF5E72D');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D25DD318D');
        $this->addSql('DROP INDEX IDX_1981A66D9B6B5FBA ON operation');
        $this->addSql('DROP INDEX IDX_1981A66DBCF5E72D ON operation');
        $this->addSql('DROP INDEX IDX_1981A66D25DD318D ON operation');
        $this->addSql('ALTER TABLE operation ADD account_id_id INT DEFAULT NULL, ADD categorie_id_id INT DEFAULT NULL, ADD libelle_id_id INT DEFAULT NULL, DROP account_id, DROP categorie_id, DROP libelle_id');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D49CB4726 FOREIGN KEY (account_id_id) REFERENCES account (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D8A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DB193E41D FOREIGN KEY (libelle_id_id) REFERENCES libelle (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1981A66D49CB4726 ON operation (account_id_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D8A3C7387 ON operation (categorie_id_id)');
        $this->addSql('CREATE INDEX IDX_1981A66DB193E41D ON operation (libelle_id_id)');
        $this->addSql('ALTER TABLE libelle CHANGE description description VARCHAR(255) NOT NULL');
    }
}

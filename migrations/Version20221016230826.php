<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221016230826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE client_seq INCREMENT BY 1 MINVALUE 17 START 17');
        $this->addSql('CREATE SEQUENCE commande_seq INCREMENT BY 1 MINVALUE 8 START 8');
        $this->addSql('CREATE SEQUENCE post_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE produit_seq INCREMENT BY 1 MINVALUE 8 START 8');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, ncli VARCHAR(5) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, cat VARCHAR(2) DEFAULT NULL, compte INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C74404554D0AD702 ON client (ncli)');
        $this->addSql('CREATE TABLE commande (id INT NOT NULL, ncli_id INT NOT NULL, ncom VARCHAR(5) NOT NULL, datecom DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EEAA67D614A40D8 ON commande (ncom)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D4B69ABD5 ON commande (ncli_id)');
        $this->addSql('CREATE TABLE detail (id INT NOT NULL, ncom_id INT NOT NULL, npro_id INT NOT NULL, qcom INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2E067F9383AB4652 ON detail (ncom_id)');
        $this->addSql('CREATE INDEX IDX_2E067F933490ADDF ON detail (npro_id)');
        $this->addSql('CREATE TABLE post (id INT NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, excerpt VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE produit (id INT NOT NULL, npro VARCHAR(5) NOT NULL, libelle VARCHAR(255) NOT NULL, prix INT NOT NULL, qstock INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC276E4850C1 ON produit (npro)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D4B69ABD5 FOREIGN KEY (ncli_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9383AB4652 FOREIGN KEY (ncom_id) REFERENCES commande (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F933490ADDF FOREIGN KEY (npro_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE client_seq CASCADE');
        $this->addSql('DROP SEQUENCE commande_seq CASCADE');
        $this->addSql('DROP SEQUENCE post_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produit_seq CASCADE');
        $this->addSql('ALTER TABLE commande DROP CONSTRAINT FK_6EEAA67D4B69ABD5');
        $this->addSql('ALTER TABLE detail DROP CONSTRAINT FK_2E067F9383AB4652');
        $this->addSql('ALTER TABLE detail DROP CONSTRAINT FK_2E067F933490ADDF');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

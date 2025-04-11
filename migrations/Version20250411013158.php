<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250411013158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category_media (id INT AUTO_INCREMENT NOT NULL, media_id_id INT NOT NULL, category_id_id INT NOT NULL, INDEX IDX_821FEE45605D5AE6 (media_id_id), INDEX IDX_821FEE459777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, media_id_id INT NOT NULL, parent_comment_id_id INT NOT NULL, content LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_9474526C9D86650F (user_id_id), INDEX IDX_9474526C605D5AE6 (media_id_id), INDEX IDX_9474526CA586534 (parent_comment_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, duration TIME NOT NULL, release_date DATE NOT NULL, INDEX IDX_DDAA1CDA68756988 (season_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, media_type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, short_description LONGTEXT NOT NULL, long_description LONGTEXT NOT NULL, release_date DATE NOT NULL, cover_image VARCHAR(255) NOT NULL, staff JSON NOT NULL, casting JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media_language (id INT AUTO_INCREMENT NOT NULL, language_id_id INT NOT NULL, INDEX IDX_DBBA5F071C9A06 (language_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media_language_media (media_language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B441511D7599C867 (media_language_id), INDEX IDX_B441511DEA9FDD75 (media_id), PRIMARY KEY(media_language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D782112D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist_media (id INT AUTO_INCREMENT NOT NULL, playlist_id_id INT NOT NULL, media_id_id INT NOT NULL, added_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_C930B84FDC588714 (playlist_id_id), INDEX IDX_C930B84F605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist_subscription (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, playlist_id_id INT NOT NULL, subscribed_at DATETIME NOT NULL, INDEX IDX_832940C9D86650F (user_id_id), INDEX IDX_832940CDC588714 (playlist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serie_id_id INT DEFAULT NULL, season_number INT NOT NULL, INDEX IDX_F0E45BA9B748AAC3 (serie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, price NUMERIC(10, 2) NOT NULL, duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE subscription_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, subscription_id_id INT NOT NULL, start_at DATE NOT NULL, end_at DATE NOT NULL, INDEX IDX_54AF90D09D86650F (user_id_id), INDEX IDX_54AF90D0857C9F24 (subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, current_subscription_id_id INT DEFAULT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, account_status VARCHAR(255) NOT NULL, INDEX IDX_8D93D6494924D8AF (current_subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE watch_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, media_id_id INT NOT NULL, last_watched DATETIME NOT NULL, number_of_views INT NOT NULL, INDEX IDX_DE44EFD89D86650F (user_id_id), INDEX IDX_DE44EFD8605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_media ADD CONSTRAINT FK_821FEE45605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_media ADD CONSTRAINT FK_821FEE459777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CA586534 FOREIGN KEY (parent_comment_id_id) REFERENCES comment (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F071C9A06 FOREIGN KEY (language_id_id) REFERENCES language (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511D7599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist ADD CONSTRAINT FK_D782112D9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9B748AAC3 FOREIGN KEY (serie_id_id) REFERENCES serie (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D0857C9F24 FOREIGN KEY (subscription_id_id) REFERENCES subscription (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6494924D8AF FOREIGN KEY (current_subscription_id_id) REFERENCES subscription (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE category_media DROP FOREIGN KEY FK_821FEE45605D5AE6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_media DROP FOREIGN KEY FK_821FEE459777D11E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA586534
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F071C9A06
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511D7599C867
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511DEA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D9D86650F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FDC588714
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F605D5AE6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CDC588714
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9B748AAC3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09D86650F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D0857C9F24
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6494924D8AF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8605D5AE6
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category_media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE comment
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE episode
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE language
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media_language
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media_language_media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE movie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist_media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist_subscription
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE season
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE serie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE subscription
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE subscription_history
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE `user`
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE watch_history
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}

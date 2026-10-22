-- Tap.Name database schema
-- Import via phpMyAdmin. Safe to re-run (drops tables first).

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `homepage_items`;
DROP TABLE IF EXISTS `homepage_sections`;
DROP TABLE IF EXISTS `site_settings`;
DROP TABLE IF EXISTS `admins`;
DROP TABLE IF EXISTS `card_taps`;
DROP TABLE IF EXISTS `card_profiles`;
DROP TABLE IF EXISTS `nfc_cards`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `job_batches`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `users`;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `nfc_cards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `code` varchar(6) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `tap_count` bigint unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nfc_cards_code_unique` (`code`),
  KEY `nfc_cards_user_id_foreign` (`user_id`),
  CONSTRAINT `nfc_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `card_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nfc_card_id` bigint unsigned NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `bio` text,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `avatar_path` varchar(255) DEFAULT NULL,
  `google_review_url` varchar(2048) DEFAULT NULL,
  `theme` varchar(50) NOT NULL DEFAULT 'default',
  `links` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `card_profiles_nfc_card_id_unique` (`nfc_card_id`),
  CONSTRAINT `card_profiles_nfc_card_id_foreign` FOREIGN KEY (`nfc_card_id`) REFERENCES `nfc_cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `card_taps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nfc_card_id` bigint unsigned NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `tapped_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `card_taps_nfc_card_id_foreign` (`nfc_card_id`),
  CONSTRAINT `card_taps_nfc_card_id_foreign` FOREIGN KEY (`nfc_card_id`) REFERENCES `nfc_cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
DROP TABLE IF EXISTS `homepage_items`;
DROP TABLE IF EXISTS `homepage_sections`;
DROP TABLE IF EXISTS `site_settings`;
DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `value` longtext,
  `label` varchar(255) DEFAULT NULL,
  `sort_order` int unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `homepage_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'rich_text',
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text,
  `body` longtext,
  `image_path` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `data` json DEFAULT NULL,
  `sort_order` int unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `homepage_sections_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `homepage_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `homepage_section_id` bigint unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `data` json DEFAULT NULL,
  `sort_order` int unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `homepage_items_homepage_section_id_foreign` (`homepage_section_id`),
  CONSTRAINT `homepage_items_homepage_section_id_foreign` FOREIGN KEY (`homepage_section_id`) REFERENCES `homepage_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`name`,`email`,`password`,`created_at`,`updated_at`) VALUES ('Tap.Name Admin','admin@tap.name','$2y$12$3cE1x53DZhS04tTSQbmps.AfkcY4FbCbEUT4Iwtn1BqfTFvb7GhSK',NOW(),NOW());

INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('site_name','general','text','Tap.Name','Site Name',1,NOW(),NOW());
INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('site_tagline','general','text','Identity, Just a Tap Away','Tagline',2,NOW(),NOW());
INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('contact_email','contact','text','connect@tap.name','Contact Email',3,NOW(),NOW());
INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('whatsapp','contact','text','+852 6956 5404','WhatsApp',4,NOW(),NOW());
INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('meta_title','seo','text','TAP.NAME — Identity, Just a Tap Away','Meta Title',5,NOW(),NOW());
INSERT INTO `site_settings` (`key`,`group`,`type`,`value`,`label`,`sort_order`,`created_at`,`updated_at`) VALUES ('meta_description','seo','textarea','Next-gen NFC digital business cards and review redirect hardware in Hong Kong.','Meta Description',6,NOW(),NOW());

INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('navbar','section','Navigation Bar',NULL,NULL,10,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('hero','section','Identity, Just a Tap Away','Upgrade your networking and F&B business reviews with custom NFC hardware in Hong Kong. Order sample packs and bulk orders today.',NULL,20,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('products','section','Hardware Built For Impact','Engineered for durability, instant connection, and flawless performance.',NULL,30,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('solutions','section','Tailored For Every Segment','Customized NFC deployments for every industry and use case.',NULL,40,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('advantages','section','Why Professionals Switch to Tap.Name','See why businesses are upgrading from traditional paper cards.',NULL,50,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('how_it_works','section','How It Works (3 Steps)','Get started in minutes with zero complicated setup required.',NULL,60,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('how_it_tap','section','3 Simple Steps to Tap',NULL,NULL,70,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('rfq_showcase','section','Interactive Product Lineup',NULL,NULL,80,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('specs','section','Technical Specifications',NULL,NULL,90,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('inquiry','section','Request Samples or Bulk Quotes',NULL,NULL,100,1,NOW(),NOW());
INSERT INTO `homepage_sections` (`key`,`type`,`title`,`subtitle`,`body`,`sort_order`,`is_active`,`created_at`,`updated_at`) VALUES ('footer','section','Footer',NULL,NULL,110,1,NOW(),NOW());


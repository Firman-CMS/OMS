-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "es_store" ---------------------------------
CREATE TABLE `es_store` ( 
	`id` Int( 5 ) NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "location_store" ---------------------------
CREATE TABLE `location_store` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`kota` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_brand_mapping" ------------------------
CREATE TABLE `oms_brand_mapping` ( 
	`brand_mapping_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`brand_es` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`brand_marketplace_id` Int( 5 ) NOT NULL,
	`brand_marketplace_desc` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`marketplace_id` Int( 5 ) NOT NULL,
	PRIMARY KEY ( `brand_mapping_id` ),
	CONSTRAINT `my_unique_key` UNIQUE( `brand_es`, `marketplace_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 226;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_category_mapping" ---------------------
CREATE TABLE `oms_category_mapping` ( 
	`category_mapping_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`category_es` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`category_marketplace_id` Int( 5 ) NOT NULL,
	`category_marketplace_desc` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`marketplace_id` Int( 5 ) NOT NULL,
	PRIMARY KEY ( `category_mapping_id` ),
	CONSTRAINT `my_unique_key` UNIQUE( `category_es`, `marketplace_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 12;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_color_mapping" ------------------------
CREATE TABLE `oms_color_mapping` ( 
	`color_mapping_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`color_es` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`color_marketplace_id` Int( 5 ) NOT NULL,
	`color_marketplace_desc` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`marketplace_id` Int( 5 ) NOT NULL,
	PRIMARY KEY ( `color_mapping_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 32;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_invoice_status" -----------------------
CREATE TABLE `oms_invoice_status` ( 
	`invoice_id` Int( 50 ) AUTO_INCREMENT NOT NULL,
	`marketplace_id` Int( 5 ) NOT NULL,
	`delivery_provider` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tracking_number` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`cancel_reason` VarChar( 150 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`invoice_number` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`status` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `invoice_id` ),
	CONSTRAINT `invoice_number` UNIQUE( `invoice_number` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_login" --------------------------------
CREATE TABLE `oms_login` ( 
	`user_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`address` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`hp` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`phone` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`email` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`password` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`category_code` VarChar( 1 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`active` Int( 1 ) NOT NULL DEFAULT '1',
	`birthday` Date NULL,
	`createdon` Date NOT NULL,
	`isdelete` Int( 1 ) NOT NULL DEFAULT '0',
	`note` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `user_id` ),
	CONSTRAINT `email` UNIQUE( `email` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_marketplace" --------------------------
CREATE TABLE `oms_marketplace` ( 
	`marketplace_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`marketplace_name` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`marketplace_prefix` VarChar( 2 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `marketplace_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_privilege" ----------------------------
CREATE TABLE `oms_privilege` ( 
	`privilege_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`privilege_name` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`privilege_code` VarChar( 1 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `privilege_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_product" ------------------------------
CREATE TABLE `oms_product` ( 
	`product_id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`productES_id` Int( 5 ) NOT NULL,
	`sku` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`product_name` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`brand_id` Int( 5 ) NOT NULL,
	`category_id` Int( 5 ) NOT NULL,
	`color_id` Int( 5 ) NOT NULL,
	`price` VarChar( 15 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`weight_package` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`weight_product` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`product_hightlight` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`product_full_description` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`images` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`product_attributes` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`dimension_package` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`dimension_product` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`youtube_url` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`handling_fee` Int( 10 ) NOT NULL,
	`insurance` TinyInt( 1 ) NOT NULL,
	`jabodetabek_only` TinyInt( 1 ) NOT NULL,
	`limit_qty` Int( 3 ) NOT NULL,
	`marketplace_id` Int( 5 ) NOT NULL,
	`promo_price` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`start_date` Date NOT NULL,
	`stock_available` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`stock_minimum` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`end_date` Date NOT NULL,
	`createdon` Date NOT NULL,
	`product_marketplace_id` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`product_marketplace_variant_id` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`createdby` Int( 5 ) NOT NULL,
	PRIMARY KEY ( `product_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_role" ---------------------------------
CREATE TABLE `oms_role` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`description` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_role_permission" ----------------------
CREATE TABLE `oms_role_permission` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`role_id` Int( 11 ) NOT NULL,
	`permission` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 190;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_role_user" ----------------------------
CREATE TABLE `oms_role_user` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`user_id` Int( 11 ) NOT NULL,
	`role_id` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "oms_store_mapping" ------------------------
CREATE TABLE `oms_store_mapping` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`store_id` Int( 10 ) NOT NULL,
	`location_id` Int( 5 ) NOT NULL,
	`marketplace_id` Int( 3 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- Dump data of "es_store" ---------------------------------
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5101', 'Mega Bekasi Hypermall', 'Jl. Jenderal Ahmad Yani Mega Bekasi Hypermall Ground Floor No.1, Harapan Mulya, Medan Satria' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5102', 'Poins Square Mall', 'Jalan R.A. Kartini No. 1, Lebak Bulus' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5106', 'Cibubur Junction', 'Cibubur Junction Lt. LG JL. Jambore Raya No.1 Cibubur' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5107', 'Emporium Pluit Mall', 'Jl. Pluit Selatan Raya, Penjaringan' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5110', 'Gandaria City', 'Mall Gandaria City Lantai 1, Jalan Sultan Iskandar Muda No. 8, Kebayoran Lama' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5111', 'Mall of Indonesia (MOI)', 'Mall Of Indonesia, MOI, Jl. Boulevard Bar. Raya, Klp. Gading' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5112', 'Depok Mall', 'Depok Mall Lt. 2 Jl. Margonda Raya Kav. 88 Depok' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5113', 'Living World', 'Living World 1st Floor, JL. Alam Sutera Boulevard, Kav. 21, Serpong' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5114', 'Festival Citylink', 'Jl. Peta No.241, Suka Asih, Bojongloa Kaler, Kota Bandung, Jawa Barat 40242' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5126', 'Kota Kasablanka', 'Kota Kasablanka Lantai GF, UG & LG, Jl. Casablanca' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5128', 'Mall Alam Sutra', 'Panunggangan Tim., Pinang, Kota Tangerang, Banten, Indonesia' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5135', 'Cibinong City Mall', 'Jalan Tegar Beriman No. 1, Pakansari, Cibinong, ' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5136', 'Teras Kota', 'BSD City CBD Lot VII B, Jl. Pahlawan Seribu, Lengkong Gudang, Serpong' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5138', 'Mall Taman Anggrek', 'Mall Taman Anggrek Lt. 1 Ruang T 01 - T 09 Jl. S. Parman Kav. 21 Tanjung Duren Selatan Grogol Petamburan' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5146', 'Bandung Electronic Center', 'Jl. Purnawarman, Tamansari, Bandung Wetan, Kota Bandung, Jawa Barat 40116' );
INSERT INTO `es_store`(`id`,`name`,`address`) VALUES ( '5500', 'CWH Ciracas', 'CWH Ciracas' );
-- ---------------------------------------------------------


-- Dump data of "location_store" ---------------------------
INSERT INTO `location_store`(`id`,`kota`) VALUES ( '1', 'Jakarta' );
INSERT INTO `location_store`(`id`,`kota`) VALUES ( '2', 'Depok' );
INSERT INTO `location_store`(`id`,`kota`) VALUES ( '3', 'Tangerang' );
INSERT INTO `location_store`(`id`,`kota`) VALUES ( '4', 'Bandung' );
INSERT INTO `location_store`(`id`,`kota`) VALUES ( '5', 'Bogor' );
-- ---------------------------------------------------------


-- Dump data of "oms_brand_mapping" ------------------------
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '1', 'ASUS', '136', 'Asus', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '2', 'LG', '1231', 'LG', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '3', 'DENPOO', '550', 'Denpoo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '6', 'ACME 707', '7096', 'Acme', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '9', 'A DATA', '32', 'A Data', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '10', '3DR', '19313', '3DR ', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '11', 'ACER', '2169', 'Acer', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '12', 'ADONIT', '34', 'adonit', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '13', 'ADVAN', '2183', 'Advan', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '14', 'AKARI', '54', 'Akari', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '15', 'AKG', '56', 'AKG', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '16', 'AKIRA', '14651', 'Akira', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '17', 'ALCATEL', '63', 'alcatel', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '18', 'ALKALINE', '66', 'Alkaline', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '19', 'ANTENNA SHOP', '8902', 'Antenna Shop', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '20', 'ANYMODE', '98', 'Anymode', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '21', 'APPLE', '102', 'Apple', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '22', 'APROLINK', '104', 'aprolink', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '23', 'AQUA', '106', 'Aqua', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '24', 'ARISTON', '114', 'Ariston', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '25', 'ASUS ZENFONE', '13907', 'Asus Zenfone C', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '26', 'AUDIO-TECHNICA', '6109', 'AUDIO-TECHNICA', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '27', 'AUX', '2625', 'Aux', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '28', 'AXIS', '9498', 'AXIS', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '29', 'AZALEA', '161', 'Azalea', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '30', 'B-CARE', '218', 'Bcare', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '31', 'BELKIN', '230', 'Belkin', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '32', 'BENQ', '5218', 'BenQ', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '33', 'BERVIN', '246', 'Bervin', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '34', 'BESTLIFE', '5970', 'BESTLIFE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '35', 'BIPBIP', '7634', 'Bipbip', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '36', 'BLACK & DECKER', '17949', 'Black & Decker', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '37', 'BLACK AND DECKER', '7057', 'Black and Decker', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '38', 'BLACK RAPID', '4863', 'BLACK RAPID', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '39', 'BLACKBERRY', '2141', 'Blackberry', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '40', 'BLAUPUNKT', '5571', 'BLAUPUNKT', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '41', 'BMW', '17113', 'BMW', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '42', 'BOLDE', '6541', 'Bolde', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '43', 'BOLT', '2171', 'Bolt', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '44', 'BRAUN', '6275', 'Braun', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '45', 'BRAVEN', '7197', 'braven', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '46', 'BRICA', '320', 'Brica', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '47', 'BRINNO', '5985', 'BRINNO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '48', 'BROTHER', '2230', 'BROTHER', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '49', 'BUFFALO', '332', 'BUFFALO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '50', 'CANON', '363', 'Canon', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '51', 'CASIO', '387', 'Casio', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '52', 'CASTLE', '16187', 'Castle', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '53', 'CATALYST', '18763', 'Catalyst', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '54', 'CHANGHONG', '401', 'Changhong', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '55', 'COLOUD', '2443', 'COLOUD', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '56', 'COMPAQ', '12208', 'compaq', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '57', 'COSMOS', '485', 'Cosmos', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '58', 'CREATIVE', '495', 'Creative', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '59', 'CRESYN', '5601', 'CRESYN', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '60', 'CRUMPLER', '4859', 'CRUMPLER', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '61', 'DAEWOO', '6856', 'Daewoo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '62', 'DELIZIA', '6983', 'Delizia', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '63', 'DELL', '542', 'Dell', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '64', 'DELUX', '8611', 'Deluxe', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '65', 'DiCAPAC', '563', 'Dicapac', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '66', 'DISNEY', '568', 'Disney', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '67', 'DIVOOM', '572', 'Divoom', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '68', 'DJI PHANTOM', '11571', 'DJI Phantom', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '69', 'DOMO', '7210', 'Domo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '70', 'EDIFIER', '629', 'Edifier', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '71', 'EG-MEMORY', '8337', 'EGMemory', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '72', 'ELBA', '638', 'Elba', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '73', 'ELECTROLUX', '640', 'Electrolux', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '74', 'ELITECH', '12199', 'Elitech', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '75', 'ENERPAD', '2507', 'ENERPAD', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '76', 'EPRAIZER', '5937', 'EPRAIZER', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '77', 'EPSON', '675', 'Epson', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '78', 'EVERCOSS', '695', 'evercoss', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '79', 'EXCELL', '698', 'Excell', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '80', 'EXECUTIVE', '5114', 'EXECUTIVE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '81', 'FERRARI', '5178', 'FERRARI', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '82', 'FITBIT', '6209', 'FITBIT', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '83', 'FUJIFILM', '799', 'Fujifilm', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '84', 'FUJITSU', '4926', 'FUJITSU', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '85', 'GARMIN', '812', 'Garmin', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '86', 'GENEVA', '12077', 'Geneva', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '87', 'GOLF', '14919', 'Golf', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '88', 'GOPRO', '863', 'GoPro', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '89', 'GP', '864', 'GP', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '90', 'GRIFFIN', '882', 'Griffin', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '91', 'HAIER', '4828', 'Haier', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '92', 'HALLOA', '906', 'Halloa', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '93', 'HARMAN KARDON', '2150', 'Harman Kardon', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '94', 'HELLOLULU', '6032', 'HELLOLULU', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '95', 'HEWLETT PACKARD', '11561', 'Hewlett Packcard', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '96', 'HISENSE', '11196', 'Hisense', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '97', 'HITACHI', '953', 'Hitachi', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '98', 'HP', '975', 'HP', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '99', 'HTC', '977', 'HTC', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '100', 'HUAWEI', '978', 'Huawei', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '101', 'IMATION', '1006', 'Imation', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '102', 'IPHONE', '14404', 'IPHONE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '103', 'JAWBONE', '4916', 'Jawbone', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '104', 'JBL', '1063', 'JBL', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '105', 'JUST MOBILE', '2502', 'JUST MOBILE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '106', 'JVC', '1100', 'JVC', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '107', 'KASPERSKY', '1113', 'Kaspersky', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '108', 'KINGSTON', '1144', 'Kingston', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '109', 'KODAK', '1159', 'Kodak', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '110', 'LAB-C', '2478', 'LAB C', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '111', 'LDNIO', '7013', 'LDNIO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '112', 'LEEF', '6762', 'Leef', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '113', 'LENOVO', '13662', 'Lenovo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '114', 'I-LEXUS', '2996', 'LEXUS', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '115', 'LIFEPROOF', '2501', 'LifeProof', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '116', 'LINKSYS', '1243', 'Linksys', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '117', 'LOCK&ampLOCK', '12038', 'Lock & Lock', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '118', 'LOGITECH', '1256', 'Logitech', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '119', 'LOWEPRO', '2242', 'Lowepro', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '120', 'LOYAL', '15580', 'Loyal', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '121', 'MANFROTTO', '2417', 'Manfrotto', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '122', 'MARANTZ', '1312', 'Marantz', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '123', 'MARSHALL', '2441', 'Marshall', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '124', 'MARVO', '1323', 'Marvo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '125', 'MASPION', '1326', 'Maspion', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '126', 'MATSUNICHI', '1332', 'Matsunichi', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '127', 'MEDIATECH', '1345', 'Mediatech', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '128', 'MICRODRONE', '19460', 'Micro Drone', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '129', 'MICROSOFT', '1374', 'Microsoft', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '130', 'MIDEA', '1376', 'Midea', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '131', 'MITSUBISHI', '1388', 'Mitsubishi', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '132', 'MIYAKO', '1392', 'Miyako', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '133', 'MODENA', '1401', 'Modena', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '134', 'MOSHI', '1414', 'Moshi', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '135', 'MOTOROLA', '1417', 'Motorola', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '136', 'MURAGO', '18038', 'MURAGO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '137', 'NATIONAL GEOGRAPHIC', '2457', 'National Geographic', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '138', 'NESCAFE', '2320', 'Nescafe', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '139', 'NETGEAR', '10878', 'Netgear', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '140', 'NEXIAN', '2408', 'NEXIAN', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '141', 'NIKON', '1480', 'Nikon', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '142', 'NILLKIN', '2371', 'NILLKIN', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '143', 'NINTENDO', '2252', 'Nintendo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '144', 'NOKIA', '2165', 'Nokia', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '145', 'NOONTEC', '2506', 'NOONTEC', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '146', 'OCTAGON STUDIO', '12212', 'Octagon Studio', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '147', 'OLYMPUS', '1522', 'Olympus', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '148', 'ONE', '2400', 'ONE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '149', 'OPLINK', '19159', 'Oplink', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '150', 'OPPO SMARTPHONE', '2172', 'OPPO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '151', 'OTHER', '14034', 'others', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '152', 'OTTERBOX', '2175', 'Otterbox', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '153', 'OZAKI', '2470', 'Ozaki', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '154', 'PANASONIC', '1573', 'Panasonic', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '155', 'PAPER ONE', '15568', 'Paper One', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '156', 'PARROT', '6690', 'Parrot', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '157', 'PEBBLE', '7274', 'Pebble', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '158', 'PEGATRON', '11701', 'Pegatron', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '159', 'PHILIPS', '13351', 'Philips', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '160', 'PIONEER', '1608', 'Pioneer', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '161', 'PNY', '1625', 'PNY', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '162', 'POLARIS', '5875', 'POLARIS', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '163', 'POLYTRON', '2423', 'Polytron', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '164', 'POWERLOGIC', '6896', 'Powerlogic', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '165', 'PQI', '5592', 'PQI', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '166', 'PROLINK', '1671', 'Prolink', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '167', 'PX', '5038', 'PX', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '168', 'QUANTUM', '1685', 'Quantum', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '169', 'RAPOO', '2430', 'RAPOO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '170', 'REMAX', '2397', 'Remax', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '171', 'RINNAI', '1730', 'Rinnai', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '172', 'ROMAN', '5227', 'ROMAN', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '173', 'ROYAL', '6893', 'Royal', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '174', 'RUNTASTIC', '16102', 'Runtastic', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '175', 'SAHITEL', '5867', 'SAHITEL', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '176', 'SAMSUNG', '1779', 'Samsung', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '177', 'SANDISK', '1782', 'Sandisk', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '178', 'SANKEN', '1785', 'Sanken', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '179', 'SANYO', '1791', 'Sanyo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '180', 'SDV', '1806', 'SDV', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '181', 'SEAGATE', '2383', 'SEAGATE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '182', 'SHARP', '1825', 'Sharp', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '183', 'SHURE', '2161', 'SHURE', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '184', 'SICRON', '18862', 'Sicron', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '185', 'SIMBADDA', '1847', 'Simbadda', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '186', 'SJCAM', '1855', 'Sjcam', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '187', 'SKROSS', '1860', 'Skross', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '188', 'SMARTFREN', '2182', 'Smartfren', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '189', 'SONIC GEAR', '2146', 'Sonic Gear', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '190', 'SONY', '1880', 'Sony', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '191', 'SOUND MAGIC', '5050', 'SOUND MAGIC', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '192', 'SPECTRA', '2220', 'Spectra', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '193', 'SPHERO', '11552', 'Sphero', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '194', 'TAMRON', '2424', 'Tamron', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '195', 'TARGUS', '1951', 'Targus', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '196', 'TCL', '1955', 'TCL', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '197', 'TDK', '2385', 'TDK', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '198', 'TECSTAR', '1959', 'Tecstar', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '199', 'UNBRANDED', '14719', 'The unbranded brand', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '200', 'TOSHIBA', '2002', 'Toshiba', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '201', 'TP-LINK', '2008', 'TP-Link', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '202', 'TRANSCEND', '2010', 'Transcend', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '203', 'TRENDMICRO', '6165', 'TRENDMICRO', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '204', 'TYLT', '7349', 'TYLT', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '205', 'UAG', '6680', 'UAG', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '206', 'UNILEVER', '2039', 'Unilever', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '207', 'UNIQUE', '2192', 'uNiQue', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '208', 'UNPLUG', '7382', 'Unplug', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '209', 'URBANEARS', '2442', 'URBANEARS', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '210', 'USB.COM', '13178', 'USB ', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '211', 'UTICON', '6841', 'Uticon', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '212', 'VGEN', '13821', 'vgen', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '213', 'VINZO', '2398', 'Vinzo', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '214', 'VIORA', '5689', 'VIORA', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '215', 'WALKERA', '11771', 'Walkera', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '216', 'WD', '2382', 'WD', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '217', 'WESTERN DIGITAL', '2094', 'Western Digital', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '218', 'WINN GAS', '2268', 'Winn Gas', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '219', 'XEROX', '5101', 'XEROX', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '220', 'XIAOMI', '2105', 'Xiaomi', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '221', 'XL', '14765', 'xl', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '222', 'YAMAHA', '2111', 'Yamaha', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '223', 'YONGMA', '3170', 'YONGMA', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '224', 'ZEROWATT', '5969', 'ZEROWATT', '1' );
INSERT INTO `oms_brand_mapping`(`brand_mapping_id`,`brand_es`,`brand_marketplace_id`,`brand_marketplace_desc`,`marketplace_id`) VALUES ( '225', 'ZUMREED', '9629', 'zumreed', '1' );
-- ---------------------------------------------------------


-- Dump data of "oms_category_mapping" ---------------------
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '1', '1', '630', 'AC', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '3', 'Television', '45', 'Televisi', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '4', '2', '45', 'Televisi', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '5', '3', '45', 'Televisi', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '8', '5', '4', 'Handphone Basic', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '9', '6', '4', 'Handphone Basic', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '10', '20', '45', 'Televisi', '1' );
INSERT INTO `oms_category_mapping`(`category_mapping_id`,`category_es`,`category_marketplace_id`,`category_marketplace_desc`,`marketplace_id`) VALUES ( '11', 'tester', '3', 'Smartphone', '1' );
-- ---------------------------------------------------------


-- Dump data of "oms_color_mapping" ------------------------
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '1', 'Biru', '4', 'Blue', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '2', 'Putih', '16', 'White', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '3', 'Abu - abu', '8', 'grey', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '4', 'Cokelat', '5', 'brown', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '5', 'Emas', '6', 'gold', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '6', 'Hijau', '7', 'green', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '7', 'Hitam', '3', 'black', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '8', 'Kuning', '17', 'yellow', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '9', 'Merah', '13', 'red', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '10', 'Oranye', '10', 'orange', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '11', 'Pink', '11', 'merah jambu', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '12', 'Silver', '14', 'perak', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '13', 'Ungu', '12', 'purple', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '14', 'Beige', '2', 'beige', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '15', 'Magenta', '741', 'magenta', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '16', 'Merah Tua', '737', 'maroon', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '17', 'Orange', '10', 'orange', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '18', 'Peach', '739', 'persik', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '19', 'perunggu', '732', 'bronze', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '20', 'badam', '731', 'almond', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '21', 'kopi', '734', 'coffee', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '22', 'unta', '733', 'camel', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '23', 'krim', '735', 'cream', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '24', 'fuchsia', '740', 'fuchsia', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '25', 'khaki', '736', 'khaki', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '26', 'multi warna', '18', 'Multi Colour', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '27', 'navy', '9', 'navy', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '28', 'tidak ada warna', '1', 'no color', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '29', 'Lainnya', '19', 'others', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '30', 'tan', '738', 'tan', '1' );
INSERT INTO `oms_color_mapping`(`color_mapping_id`,`color_es`,`color_marketplace_id`,`color_marketplace_desc`,`marketplace_id`) VALUES ( '31', 'pirus', '15', 'torquise', '1' );
-- ---------------------------------------------------------


-- Dump data of "oms_invoice_status" -----------------------
-- ---------------------------------------------------------


-- Dump data of "oms_login" --------------------------------
INSERT INTO `oms_login`(`user_id`,`name`,`address`,`hp`,`phone`,`email`,`password`,`category_code`,`active`,`birthday`,`createdon`,`isdelete`,`note`) VALUES ( '1', 'Yung Fei.', 'Jakarta', '08992369126', '08992369126', 'yungfei1989@gmail.com', '794885428ddb12e1b64e52fb6650de0e', NULL, '1', '1900-12-29', '0000-00-00', '0', '<p>tes<br></p>' );
INSERT INTO `oms_login`(`user_id`,`name`,`address`,`hp`,`phone`,`email`,`password`,`category_code`,`active`,`birthday`,`createdon`,`isdelete`,`note`) VALUES ( '2', 'Dwikky Maradhiza', 'Testing', '123123123', '123123123', 'dwikkymaradhiza@yahoo.com', '8f5670586880fc41fb66e930cf1c9fd7', NULL, '1', '2017-01-17', '0000-00-00', '0', '' );
INSERT INTO `oms_login`(`user_id`,`name`,`address`,`hp`,`phone`,`email`,`password`,`category_code`,`active`,`birthday`,`createdon`,`isdelete`,`note`) VALUES ( '3', 'mansil', '', '', '', 'firman766hi@gmail.com', '2f7bc80d483c8ed55ebd7b0b7a8368ff', NULL, '1', '0000-00-00', '0000-00-00', '0', '' );
-- ---------------------------------------------------------


-- Dump data of "oms_marketplace" --------------------------
INSERT INTO `oms_marketplace`(`marketplace_id`,`marketplace_name`,`marketplace_prefix`) VALUES ( '1', 'Matahari Mall', 'MM' );
INSERT INTO `oms_marketplace`(`marketplace_id`,`marketplace_name`,`marketplace_prefix`) VALUES ( '2', 'Lazada', 'LZ' );
-- ---------------------------------------------------------


-- Dump data of "oms_privilege" ----------------------------
INSERT INTO `oms_privilege`(`privilege_id`,`privilege_name`,`privilege_code`) VALUES ( '1', 'SuperUser', 'S' );
-- ---------------------------------------------------------


-- Dump data of "oms_product" ------------------------------
INSERT INTO `oms_product`(`product_id`,`productES_id`,`sku`,`product_name`,`brand_id`,`category_id`,`color_id`,`price`,`weight_package`,`weight_product`,`product_hightlight`,`product_full_description`,`images`,`product_attributes`,`dimension_package`,`dimension_product`,`youtube_url`,`handling_fee`,`insurance`,`jabodetabek_only`,`limit_qty`,`marketplace_id`,`promo_price`,`start_date`,`stock_available`,`stock_minimum`,`end_date`,`createdon`,`product_marketplace_id`,`product_marketplace_variant_id`,`createdby`) VALUES ( '1', '14', 'S-18NLA', 'LG AC Split 2 PK S-18NLA - Putih', '2', '1', '2', '8599000', '50', '35', '[{"sequence":"1","description":" Filter udara untuk anti bakteri dan jamur"},{"sequence":"2","description":" Proses pendinginan yang cepat"},{"sequence":"3","description":" Desain yang menawan"},{"sequence":"4","description":" Pengatur otomatis"}]', 'Dinginkan ruangan secara cepat dengan teknologi Jet Cool yang dapat menyejukkan ruangan dalam waktu 3 menit. Dengan filter udaranya LG AC Split 2 PK mencegah bakteri dan debu menganggu waktu istirahat Sahabat ESer. Dilengkapi tombol Deep Sleep untuk mengatur temperatur ruangan secara otomatis dan membuat Sahabat ESer dapat tidur lebih nyenyak.', '[{"sequence":"1","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_1.jpg"},{"sequence":"2","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_2.jpg"},{"sequence":"3","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_3.jpg"},{"sequence":"4","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_4.jpg"},{"sequence":"5","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_5.jpg"}]', '', '475 x 840 x 1080 cm', '770 x 285 x 540 cm', '', '0', '0', '0', '0', '1', '', '0000-00-00', '100', '10', '0000-00-00', '2016-11-07', 'XMA00281300000000', 'XMA0028130000000001', '1' );
INSERT INTO `oms_product`(`product_id`,`productES_id`,`sku`,`product_name`,`brand_id`,`category_id`,`color_id`,`price`,`weight_package`,`weight_product`,`product_hightlight`,`product_full_description`,`images`,`product_attributes`,`dimension_package`,`dimension_product`,`youtube_url`,`handling_fee`,`insurance`,`jabodetabek_only`,`limit_qty`,`marketplace_id`,`promo_price`,`start_date`,`stock_available`,`stock_minimum`,`end_date`,`createdon`,`product_marketplace_id`,`product_marketplace_variant_id`,`createdby`) VALUES ( '2', '13', 'S-12NLA', 'LG - AC - Split - 1.5 PK - Air Filter - Deep Sleep', '1', '1', '1', '6399000', '35', '0', '[{"sequence":"1","description":"teeeeeeeeeeeeeeeeeee"},{"sequence":"2","description":"No description Yet"},{"sequence":"3","description":"No description Yet"},{"sequence":"4","description":"No description Yet"}]', 'Dinginkan ruangan secara cepat dengan teknologi Jet Cool yang dapat menyejukkan ruangan dalam waktu 3 menit. Dengan filter udaranya, LG AC Split 1 1/2 PK mencegah bakteri dan debu menganggu waktu istirahat Sahabat ESer. Dilengkapi tombol Deep Sleep untuk mengatur temperatur ruangan secara otomatis dan membuat Sahabat ESer dapat tidur lebih nyenyak.', '[{"sequence":"1","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_1.jpg"},{"sequence":"2","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_2.jpg"},{"sequence":"3","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_3.jpg"},{"sequence":"4","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_4.jpg"},{"sequence":"5","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_5.jpg"}]', '[{"id":"1","value":"1 year"},{"id":"4","value":""},{"id":"6","value":""},{"id":"13","value":""},{"id":"20","value":""},{"id":"73","value":""},{"id":"74","value":""},{"id":"87","value":""},{"id":"98","value":""}]', '675 x 770 x 835 cm', '720 x 500 x 500 cm', '', '0', '0', '0', '0', '1', '', '0000-00-00', '100', '10', '0000-00-00', '2016-11-08', 'XHA00281300000004', 'XHA0028130000000401', '1' );
-- ---------------------------------------------------------


-- Dump data of "oms_role" ---------------------------------
INSERT INTO `oms_role`(`id`,`name`,`description`) VALUES ( '3', 'Superadmin', 'Superadmin Role' );
-- ---------------------------------------------------------


-- Dump data of "oms_role_permission" ----------------------
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '115', '3', 'App\\Http\\Controllers\\myView@home' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '116', '3', 'Modules\\Oms\\Http\\Controllers\\OmsController@index' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '117', '3', 'Modules\\Oms\\Http\\Controllers\\OmsController@loginsubmit' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '118', '3', 'Modules\\Oms\\Http\\Controllers\\OmsController@signout' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '119', '3', 'Modules\\Oms\\Http\\Controllers\\OmsController@refreshCaptcha' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '120', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@dashboard' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '121', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@userPage' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '122', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@product' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '123', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editproductMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '124', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@saveProduct' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '125', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@deleteProduct' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '126', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@productES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '127', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@searchProductES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '128', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@editProductES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '129', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@brandES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '130', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@searchBrandES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '131', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@editBrandES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '132', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@saveBrandES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '133', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@colorES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '134', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@searchColorES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '135', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@editColorES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '136', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@saveColorES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '137', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@categoryES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '138', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@searchCategoryES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '139', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@editCategoryES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '140', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@saveCategoryES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '141', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@brandMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '142', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@colorMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '143', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@categoryMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '144', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@searchBrandMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '145', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editBrandMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '146', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editColorMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '147', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editCategoryMP' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '148', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@configuration' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '149', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@changePassword' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '150', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@savePassword' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '151', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@category' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '152', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editUser' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '153', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@saveUser' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '154', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@deleteItem' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '155', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@deactiveItem' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '156', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@deleteSoftItem' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '157', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@privilege' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '158', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editprivilege' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '159', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@savePrivilege' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '160', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@role' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '161', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editRole' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '162', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@saveRole' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '163', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@deleteRole' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '164', '3', 'Modules\\Oms\\Http\\Controllers\\MMConnectedController@getMMBrand' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '165', '3', 'Modules\\Oms\\Http\\Controllers\\MMConnectedController@getMMCategory' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '166', '3', 'Modules\\Oms\\Http\\Controllers\\MMConnectedController@getMMColor' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '167', '3', 'Modules\\Oms\\Http\\Controllers\\MMConnectedController@getMMAttributes' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '168', '3', 'Modules\\Oms\\Http\\Controllers\\MMConnectedController@getMMOrder' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '169', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@getEsProduct' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '170', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@getEsBrand' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '171', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@getEsColor' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '172', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@listColorES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '173', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@listBrandES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '174', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@listCategoryES' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '175', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@listBrandESModals' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '176', '3', 'Modules\\Oms\\Http\\Controllers\\ESConnectedController@listColorESModals' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '177', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listColor' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '178', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listBrand' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '179', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listCategory' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '180', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listAttributes' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '181', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listColorMPModals' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '182', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listBrandMPModals' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '183', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@listCategoryMPModals' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '184', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@getMapping' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '185', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@orderList' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '186', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@getOrderList' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '187', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@editOrderList' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '188', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@updateStatus' );
INSERT INTO `oms_role_permission`(`id`,`role_id`,`permission`) VALUES ( '189', '3', 'Modules\\Oms\\Http\\Controllers\\DashboardController@storeMP' );
-- ---------------------------------------------------------


-- Dump data of "oms_role_user" ----------------------------
INSERT INTO `oms_role_user`(`id`,`user_id`,`role_id`) VALUES ( '1', '1', '3' );
INSERT INTO `oms_role_user`(`id`,`user_id`,`role_id`) VALUES ( '3', '3', '3' );
-- ---------------------------------------------------------


-- Dump data of "oms_store_mapping" ------------------------
INSERT INTO `oms_store_mapping`(`id`,`store_id`,`location_id`,`marketplace_id`) VALUES ( '1', '5110', '1', '2' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------



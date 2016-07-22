<?php
/**
 *  This is sample config file you should put your own values and
 * rename it to yu_config.php
 * Search for special configs with hashtags!
 * @license GPL 3
 * @author QTI3E
 */

/*
 * Configurations for database
 * #db
 */
/**
 * Constant `db_driver`
 *  It's for setting your database driver for making connections.
 *  1. mysqli
 *  2. pdo
 *  3. redis
 */
define('db_driver','mysqli');
/**
 * Constant `db_host`
 *  It's address of place that your database is located.
 */
define('db_host','127.0.0.1');
/**
 * Constant `port`
 *  Your database port
 *  Default values:
 *      MySQL   3306
 *      Redis   6379
 */
define('db_port','3306');
/**
 * Constant `db_name`
 * Your database name
 *  In redis it's a integer value between 0-255 and default value for redis is 0
 */
define('db_name','test');
/**
 * Constant `db_user`
 * Database username
 * Put it empty in redis :)
 */
define('db_user','root');
/**
 * Constant `db_pass`
 * Database password
 */
define('db_pass','');
/**
 * Constant `db_charset`
 * Character encoding
 */
define('db_charset','utf8');
/*
 * General configurations
 * #general
 */
/**
 * Constant `base_url`
 * Insert your website base url here
 */
define('base_url','');
/**
 * Framework language
 * Note: It's not your site language and it's only language of Youn framework, errors and system variables
 *          will shown in this language
 * Note: If you want to change it check if your language is exists in core/i18n/langs/ with following format
 *          core/i18n/langs/{%language code}.php
 * How to contribute?
 *      If you want to translate this framework to your own language copy english file and rename it to your
 *  language name after that start to translate that file.
 *  Note: Don't translate keys of array
 */
define('lang','en');
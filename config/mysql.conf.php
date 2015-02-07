<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die();
/**
 * Konfiguracja dla baz danych.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

// Nazwa hosta dla łączenia się z bazą, zwykle można zostawić domyślną.
define("MYSQL_HOST", "localhost");

// Port dla łączenia się z bazą, zwykle można zostawić domyślny.
define("MYSQL_PORT", "3306");

// Nazwa bazy danych, której uzywasz dla OpenGuild.
define("MYSQL_DB", "<baza>");

// Prefix do tabel w bazie.
define("MYSQL_PREFIX", "openguild_");

// Nazwa użytkownika mającego uprawnienia do podanej bazy.
define("MYSQL_USER", "<użytkownik>");

// Hasło użytkownika mającego uprawnienia do podanej bazy.
define("MYSQL_PASS", "<hasło>");

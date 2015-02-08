<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die();
/**
 * Konfiguracja dla bazy danych.
 * @version     1.1
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

// Nazwa hosta dla łączenia się z bazą, zwykle można zostawić domyślną.
define("MYSQL_HOST", "localhost");

// Port dla łączenia się z bazą, zwykle można zostawić domyślny.
define("MYSQL_PORT", "3306");

// Nazwa bazy danych, której uzywasz dla pluginu.
define("MYSQL_DB", "<baza>");

// Prefix do tabel w bazie, zostaw puste jeżeli go nie ma.
define("MYSQL_PREFIX", "<prefix_do_bazy>");

// Nazwa użytkownika mającego uprawnienia do podanej bazy.
define("MYSQL_USER", "<uzytkownik>");

// Hasło użytkownika mającego uprawnienia do podanej bazy.
define("MYSQL_PASS", "<haslo>");

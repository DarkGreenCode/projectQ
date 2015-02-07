<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die();
/**
 * Podstawowa konfiguracja.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

// Ścieżka do podkatalogu z projectQ (domyślnie "/" czyli główny katalog dla serwera WWW).
// Ważne! Na końcu nazwy podkatalogu nie może znajdować się znak slash.
define("CONF_CATALOG", "/");

// Opcja dla debugowania, nie zmieniaj jej jeżeli nie wiesz co robisz.
define("CONF_ROOT", $_SERVER['DOCUMENT_ROOT']);

// Tytuł wyświetalny na pasku tytułu przeglądarki i w menu.
define("CONF_TITLE", "Statystyki by SlimaK");

// Motyw używany przez projectQ, do wyboru: Cerulean, Cosmo, Darkly, Default, Flatly, Journal, Lumen, Paper, Readable, Sandstone, Simplex, Slate, Spacelab, Superhero, United, Yeti. 
define("CONF_THEME", "Default");

// Wyświetlanie błędów od PHP, przydatne podczas debugowania (true/false).
ini_set("display_errors", "false");

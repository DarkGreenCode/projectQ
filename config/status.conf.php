<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die();
/**
 * Konfiguracja dla dynamicznego statusu.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

// Czy ma być wyświetlany dynamiczny status serwera? (true/false)
define("STATUS", TRUE);

// Adres dla serwera Minecraft, zwykle można zostawić domyslny.
define("STATUS_IP", "127.0.0.1");

// Port dla serwera Minecraft, zwykle można zostawić domyślny.
define("STATUS_PORT", "25565");

// Wpisz tutaj wersję serwera. Bug: Dla serwera testowego 1.7.10 działa po wpisaniu tutaj 1.6.*, a nie 1.7.*.
define("STATUS_VER", "1.6.*");

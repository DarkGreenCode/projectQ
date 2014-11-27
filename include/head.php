<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die();
/**
 * Nagłówek dla wszystkich stron i dynamiczny status serwera.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once 'config/main.conf.php';
require_once CONF_ROOT.CONF_CATALOG.'config/status.conf.php'; ?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Systen statystyk dla OpenGuild">
    <meta name="author" content="SlimaK">

    <title><? echo CONF_TITLE; ?></title>

    <link href="<? echo CONF_CATALOG.'css/'.strtolower(CONF_THEME).'.css'; ?>" rel="stylesheet">
    <style type="text/css">
        th, td {text-align: center;}
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Nawigacja</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<? echo CONF_CATALOG ?>"><? echo CONF_TITLE ?></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<? echo CONF_CATALOG.'topPlayers.php'; ?>"><span class="glyphicon glyphicon glyphicon-fire"></span> Ranking graczy</a>
                    </li>
                    <li><a href="<? echo CONF_CATALOG.'topGuilds.php'; ?>"><span class="glyphicon glyphicon glyphicon-star-empty"></span> Ranking gildii</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" method="post">
                    <div class="form-group">
                        <input name="search[name]" type="text" class="form-control" placeholder="Wyszukiwanie...">
                    </div>
                    <input name="search[submit]" type="submit" class="btn btn-default" role="button" value="Szukaj">
                    <? if (isset($_POST['search'])) header('Location: '.CONF_CATALOG.'search.php?search='.$_POST['search']['name']); ?>
                </form>
            </div>
        </div>
    </nav>

<? if (STATUS == TRUE) {
    require_once CONF_ROOT.CONF_CATALOG.'class/MinecraftServerStatus.class.php';
    $status = new MinecraftServerStatus(); 
    $response = $status->getStatus(STATUS_IP, STATUS_VER , STATUS_PORT);
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="well well-sm" style="font-size: 18px;">
                <? if(!$response) { ?>
                    <span class="label label-danger" style="font-size: 100%;">Serwer jest teraz offline</span>
                <? } else { ?>
                    <span class="label label-success" style="font-size: 100%;">Serwer jest teraz online</span>
                    <span class="label label-info" style="font-size: 100%;">Liczba graczy: <? echo $response['players']; ?> / <? echo $response['maxplayers']; ?></span>
                <? } ?>
                </div>
            </div>
        </div>
    </div>
<? } ?>

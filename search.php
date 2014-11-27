<?php
/**
 * Wyszukiwarka graczy i gildii.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once 'include/head.php';

require_once CONF_ROOT.CONF_CATALOG.'config/mysql.conf.php';
require_once CONF_ROOT.CONF_CATALOG.'class/OpenGuild.class.php';

$projectQ = new OpenGuild();
?>

<? if (!empty($_GET['search'])) { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissible" role="alert">
                    Wyszukiwanie wśród nazw graczy i gildii zaczynających się od frazy: <b><? echo $_GET['search']; ?></b>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Wyniki wyszukiwania wśród graczy</div>
                    <table class="table table-condensed table-hover">
                        <? $projectQ -> searchPlayer($_GET['search']); ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Wyniki wyszukiwania wśród gildii</div>
                    <table class="table table-condensed table-hover">
                        <? $projectQ -> searchGuild($_GET['search']); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<? } else { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible" role="alert">Muisz wpisać pseudonim gracza lub nazwę gildii w polu wyszukiwarki.</div>
            </div>
        </div>
    </div>
<? } ?>

<? require_once CONF_ROOT.CONF_CATALOG.'include/footer.php'; ?>

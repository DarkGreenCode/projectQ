<?php
/**
 * Strona z top 100 najlepszych i najgorszych graczy.
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

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">Ranking setki najlepszych graczy</div>
                    <table class="table table-condensed table-striped table-hover">
                        <? $projectQ -> topPlayers(100); ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Ranking setki najgorszych graczy</div>
                    <table class="table table-condensed table-striped table-hover">
                        <? $projectQ -> topPlayers(100, true); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<? require_once CONF_ROOT.CONF_CATALOG.'include/footer.php'; ?>

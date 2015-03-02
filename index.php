<?php
/**
 * Główny plik indeksu (strona główna).
 * @version     1.1
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once 'include/head.php';

require_once CONF_ROOT.CONF_CATALOG.'config/mysql.conf.php';
require_once CONF_ROOT.CONF_CATALOG.'class/Main.class.php';

$projectQ = new Main();
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">Ranking najlepszych dziesięciu graczy</div>
                    <table class="table table-hover table-condensed">
                        <?php $projectQ -> topPlayers(); ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">Ranking najlepszych dziesięciu gildii</div>
                    <table class="table table-hover">
                        <?php $projectQ -> topGuilds(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'include/footer.php'; ?>

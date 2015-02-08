<?php
/**
 * Strona z szczegółowymi informacjami o danym graczu.
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
            <?php $projectQ -> infoPlayer($_GET['uuid']); ?>
        </div>
    </div>

<?php require_once 'include/footer.php'; ?>

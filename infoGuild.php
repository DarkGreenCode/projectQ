<?php
/**
 * Strona z szczegółowymi informacjami o danej gildii.
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
            <? $projectQ -> infoGuild($_GET['guild']); ?>
        </div>
    </div

<? require_once CONF_ROOT.CONF_CATALOG.'include/footer.php'; ?>

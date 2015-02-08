<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die("Direct access forbidden");
/**
 * Klasa FunnyGuildsQueries odpowiedzialna za obsługę zapytań do bazy pluginu FunnyGuilds.
 * @version     1.1
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once CONF_ROOT.CONF_CATALOG.'class/MysqliQueriesManager.class.php';

class FunnyGuildsQueries extends MysqliQueriesManager {

    protected $static_db;
    private $checkTables;
    private $checkHardcoreModule;

    public function __construct() {
        parent::__construct();
        $this->checkTables = $this->checkTables();
    }

    private function checkTables() {
        $tables = array('users', 'guilds');
        $return = TRUE;

        foreach ($tables as $table) {
            $checkExist = $this->check("SHOW TABLES LIKE '".MYSQL_PREFIX.$table."'");
            $checkNotEmpty = $this->check("SELECT * FROM ".MYSQL_PREFIX.$table." LIMIT 1");

            if ($checkExist === FALSE || $checkNotEmpty === FALSE) {   
                $return = FALSE;
                break;
            }
        }
        return $return;
    }

    public function topGuilds($max, $losers) {
        if ($this->checkTables === TRUE) {
            if ($losers === TRUE) {
                $sort = 'ASC'; 
                $rsort = 'DESC';
            } else {
                $sort = 'DESC'; 
                $rsort = 'ASC';
            }
            return $this->query("SELECT tag, SUM(points) AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(name) as members FROM ".MYSQL_PREFIX."users INNER JOIN ".MYSQL_PREFIX."guilds ON guild = tag GROUP BY tag ORDER BY points {$sort}, kills {$sort}, deaths {$rsort} LIMIT ".$max*2);
        }
    }

    public function topPlayers($max, $losers) {
        if ($this->checkTables === TRUE) {
            if ($losers === TRUE) {
                $sort = 'ASC'; 
                $rsort = 'DESC';
            } else {
                $sort = 'DESC'; 
                $rsort = 'ASC';
            }
            return $this->query("SELECT uuid, name, guild, points, kills, deaths FROM ".MYSQL_PREFIX."users ORDER BY points {$sort}, kills {$sort}, deaths {$rsort} LIMIT ".$max*2);
        }
    }  

    public function searchGuild($guild) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT tag, SUM(points) AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(lastseenname) as members FROM ".MYSQL_PREFIX."users INNER JOIN ".MYSQL_PREFIX."guilds ON guild = tag WHERE tag LIKE '{$guild}%' GROUP BY tag ORDER BY tag LIMIT 100");
        }
    }

    public function searchPlayer($player) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT uuid, name, guild, points, kills, deaths FROM ".MYSQL_PREFIX."users WHERE name LIKE '{$player}%' ORDER BY name LIMIT 100");
        }
    }

    public function infoGuild($guild) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT tag, deputy as description, SUM(points) AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(name) as members, GROUP_CONCAT(DISTINCT name ORDER BY points SEPARATOR ', ') as members_name, GROUP_CONCAT(DISTINCT uuid ORDER BY points SEPARATOR ', ') as members_uuid FROM ".MYSQL_PREFIX."users INNER JOIN ".MYSQL_PREFIX."guilds ON guild = tag WHERE tag = '{$guild}'");
        }
    }

    public function infoPlayer($uuid) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT uuid, name, guild, points, kills, deaths FROM ".MYSQL_PREFIX."users WHERE uuid = '{$uuid}'");
        }
    }
}   

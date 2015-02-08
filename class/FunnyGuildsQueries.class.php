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

    public function __construct() {
        parent::__construct();
        $this->checkTables = $this->checkTables();
    }

    private function checkTables() {
        $tables = array('users', 'guilds');
        $return = TRUE;

        foreach ($tables as $table) {
            $checkExist = $this->check("SHOW TABLES LIKE '{$table}'");
            $checkNotEmpty = $this->check("SELECT * FROM `{$table}` LIMIT 1");

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
            return $this->query("SELECT guilds.tag AS tag, guilds.points AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(users.name) AS members FROM `users` INNER JOIN `guilds` ON users.guild = guilds.name GROUP BY tag ORDER BY points {$sort}, kills {$sort}, deaths {$rsort} LIMIT ".$max*2);
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
            return $this->query("SELECT users.uuid AS uuid, users.name AS name, guilds.tag AS guild, users.points AS points, kills, deaths FROM `users` INNER JOIN `guilds` ON users.guild = guilds.name ORDER BY points {$sort}, kills {$sort}, deaths {$rsort} LIMIT ".$max*2);
        }
    }  

    public function searchGuild($guild) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT tag, guilds.points AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(users.name) AS members FROM `users` INNER JOIN `guilds` ON users.guild = guilds.name WHERE tag LIKE '{$guild}%' GROUP BY tag ORDER BY tag LIMIT 100");
        }
    }

    public function searchPlayer($player) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT users.uuid AS uuid, users.name AS name, guilds.tag AS guild, users.points AS points, kills, deaths FROM `users`  INNER JOIN `guilds` ON users.guild = guilds.name WHERE users.name LIKE '{$player}%' ORDER BY name LIMIT 100");
        }
    }

    public function infoGuild($guild) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT tag, guilds.name AS description, guilds.points AS points, SUM(kills) AS kills, SUM(deaths) AS deaths, COUNT(users.name) AS members, GROUP_CONCAT(DISTINCT users.name ORDER BY users.points SEPARATOR ', ') AS members_name, GROUP_CONCAT(DISTINCT users.uuid ORDER BY users.points SEPARATOR ', ') AS members_uuid FROM `users` INNER JOIN `guilds` ON users.guild = guilds.name WHERE tag = '{$guild}'");
        }
    }

    public function infoPlayer($uuid) {
        if ($this->checkTables === TRUE) {
            return $this->query("SELECT users.uuid AS uuid, users.name AS name, guilds.tag AS guild, users.points AS points, kills, deaths FROM `users` INNER JOIN `guilds` ON users.guild = guilds.name WHERE users.uuid = '{$uuid}'");
        }
    }
}   

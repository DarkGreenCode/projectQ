<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die("Direct access forbidden");
/**
 * Klasa OpenGuild odpowiedzialna za obsługę tegoż pluginu.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once CONF_ROOT.CONF_CATALOG.'class/OpenGuildQueries.class.php';

class OpenGuild {

    private $queries;
    private $skinSize;

    public function __construct() {
        $this->queries = new OpenGuildQueries();
        $this->skinSize = '32';
    }

    public function topGuilds($max = 10, $losers = false) {
        $guilds = $this->queries->topGuilds($max, $losers);

        echo '
        <thead>
            <tr>
                <th>###</th>
                <th>Nazwa</th>
                <th>Członków</th>
                <th>Punkty</th>
                <th>Zabicia</th>
                <th>Zgony</th>
            </tr>
        </thead>
        </tbody>';

        $c = 0; $pozycja = 1;
        while ($c <= $max-1) {
            if (!empty($guilds[$c])) {
                $link['guild'] = "<a href=\"".CONF_CATALOG."infoGuild.php?guild={$guilds[$c]->tag}\">";
                echo
                    "<tr>
                        <td>".$pozycja++."</td>
                        <td><b>[{$link['guild']}{$guilds[$c]->tag}</a>]</b></td>
                        <td>{$guilds[$c]->members}</td>
                        <td>{$guilds[$c]->points}</td>
                        <td>{$guilds[$c]->kills}</td>
                        <td>{$guilds[$c]->deaths}</td>
                    </tr>";
                $c++;
            } else break;
        }
        echo '</tbody>';
    }

    public function topPlayers($max = 10, $losers = false) {
        $players = $this->queries->topPlayers($max, $losers);

        echo '
        <thead>
            <tr>
                <th>###</th>
                <th>Skin</th>
                <th>Pseudonim</th>
                <th>Punkty</th>
                <th>Zabicia</th>
                <th>Zgony</th>
                <th>Gildia</th>
            </tr>
        </thead>
        <tbody>';

        $c = 0; $pozycja = 1;
        while ($c <= $max-1) {
            if (!empty($players[$c])) {
                $link['player'] = "<a href=\"".CONF_CATALOG."infoPlayer.php?uuid={$players[$c]->uuid}\">";
                $link['guild'] = "<a href=\"".CONF_CATALOG."infoGuild.php?guild={$players[$c]->guild}\">";
                $skin = "<img src=\"https://minespy.net/api/head/{$players[$c]->name}/{$this->skinSize}\" title=\"{$players[$c]->name}\" class=\"img-rounded\"></img>";

                echo
                "<tr>
                    <td>".$pozycja++."</td>
                    <td>{$link['player']}{$skin}</a></td>
                    <td><b>{$link['player']}{$players[$c]->name}</a></b></td>
                    <td>{$players[$c]->points}</td>
                    <td>{$players[$c]->kills}</td>
                    <td>{$players[$c]->deaths}</td>
                    <td>[<b>{$link['guild']}{$players[$c]->guild}</a></b>]</td>
                </tr>";
                $c++;
            } else break;
        }
        echo '</tbody>';
    }

    public function searchGuild($guild) {
        $guilds = $this->queries->searchGuild($guild);

        if (empty($guilds[0]->tag)) {
            echo '<tbody><tr><td class="danger">Nie znaleziono takiej gildii w bazie.</td></tr></tbody>';
        } else {
            echo '
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Punkty</th>
                    <th>Członków</th>
                    <th>Zabicia</th>
                    <th>Zgony</th>
                </tr>
            </thead>
            <tbody>';

            foreach ($guilds as $guild) {
                $link['guild'] = "<a href=\"".CONF_CATALOG."infoGuild.php?guild={$guild->tag}\">";
                echo
                "<tr>
                    <td><b>[{$link['guild']}{$guild->tag}</a>]</b></td>
                    <td>{$guild->points}</td>
                    <td>{$guild->members}</td>
                    <td>{$guild->kills}</td>
                    <td>{$guild->deaths}</td>
                </tr>";
            }
            echo '</tbody>';
        }
    }

    public function searchPlayer($player) {
        $players = $this->queries->searchPlayer($player);

        if (empty($players[0]->name)) {
            echo '<tbody><tr><td class="danger">Nie znaleziono takiego gracza w bazie.</tr></td></tbody>';
        } else {
            echo '
            <thead>
                <tr>
                    <th>Skin</th>
                    <th>Pseudonim</th>
                    <th>Punkty</th>
                    <th>Zabicia</th>
                    <th>Zgony</th>
                    <th>Gildia</th>
                </tr>
            </thead>
            <tbody>';

            foreach ($players as $player) {
                $link['player'] = "<a href=\"".CONF_CATALOG."infoPlayer.php?uuid={$player->uuid}\">";
                $link['guild'] = "<a href=\"".CONF_CATALOG."infoGuild.php?guild={$player->guild}\">";
                $skin = "<img src=\"https://minespy.net/api/head/{$player->name}/{$this->skinSize}\" title=\"{$player->name}\" class=\"img-rounded\"></img>";

                echo
                "<tr>
                    <td>{$link['player']}{$skin}</a></td>
                    <td><b>{$link['player']}{$player->name}</a></b></td>
                    <td>{$player->points}</td>
                    <td>{$player->kills}</td>
                    <td>{$player->deaths}</td>
                    <td>[<b>{$link['guild']}{$player->guild}</a></b>]</td>
                </tr>";
            }
            echo '</tbody>';
        }
    }
    
    public function infoGuild($guild) {
        $guild = $this->queries->infoGuild($guild);
        $guild = $guild[0];

        if (empty($guild->tag)) {
            echo '<div class="col-lg-12"><div class="alert alert-danger">Nie można wyświetlić informacji o nieistniejącej gildii. Do wyszukania gildii użyj wyszukiwarki.</div></div>';
        } else {
            echo "
            <div class=\"col-lg-offset-1 col-lg-11\"><h1>[{$guild->tag}]<small>{$guild->description}</small></h1></div>
            <div class=\"col-md-8\"><div class=\"panel panel-info\">
                    <table class=\"table\">
                        <tbody>
                            <tr><th class=\"info\">Ilość członków</th><td>{$guild->members}</td></tr>
                            <tr><th class=\"info\">Suma punktów</th><td>{$guild->points}</td></tr>
                            <tr><th class=\"info\">Suma zabić</th><td>{$guild->kills}</td></tr>
                            <tr><th class=\"info\">Suma zgonów</th><td>{$guild->deaths}</td></tr>
                        </tbody>
                    </table>
            </div></div>";

            echo '<div class="col-md-4">';
                $members_info = array_combine(explode(", ", $guild->members_name), explode(", ", $guild->members_uuid));
                foreach ($members_info as $name => $uuid) {
                    echo "<a href=\"".CONF_CATALOG."infoPlayer.php?uuid={$uuid}\"><img src=\"https://minespy.net/api/head/{$name}\" alt=\"{$name}\" title=\"{$name}\" width=\"25%\" class=\"img-thumbnail\"></img></a>";
                }
            echo '</div>';
        }


    }

    public function infoPlayer($uuid) {
        $player = $this->queries->infoPlayer($uuid);
        $player = $player[0];

        if (empty($player->uuid)) {
            echo '<div class="col-lg-12"><div class="alert alert-danger">Nie można wyświetlić informacji o nieistniejącym graczu. Do wyszukania graczy użyj wyszukiwarki.</div></div>';
        } else {
            echo "
            <div class=\"col-lg-offset-1 col-lg-11\"><h1>{$player->name}</h1></div>
            <div class=\"col-md-8\"><div class=\"panel panel-info\">
                    <table class=\"table\">
                        <tbody>
                            <tr><th class=\"info\">Punkty</th><td>{$player->points}</td></tr>
                            <tr><th class=\"info\">Zabicia</th><td>{$player->kills}</td></tr>
                            <tr><th class=\"info\">Zgony</th><td>{$player->deaths}</td></tr>
                            <tr><th class=\"info\">Gildia</th><td>[<b><a href=\"".CONF_CATALOG."infoGuild.php?guild={$player->guild}\">{$player->guild}</a></b>]</td></tr>
                        </tbody>
                    </table>
            </div></div>
            <div class=\"col-md-4\">
                <img src=\"https://minespy.net/api/head/{$player->name}\" width=\"100%\" class=\"img-thumbnail\"></img>
            </div>";
        }
    }
}


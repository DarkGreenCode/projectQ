<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die("Direct access forbidden");
/**
 * Klasa MysqliQueriesManager zarządzająca zapytaniami do bazy danych MySQL.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

require_once CONF_ROOT.CONF_CATALOG.'class/MysqliStaticConnector.class.php';

class MysqliQueriesManager {

    protected $static_db;

    public function __construct() {
        $this->static_db = MysqliStaticConnector::init();
    }

    protected function query($query) {
        $result = $this->static_db->query($query);

        if (!empty($result)) {
            if ($result->num_rows > 0) {	
                while ($row = $result->fetch_object()) {
                    $results[] = $row;
                }
                return $results;
            }
        }
    }

    protected function check($query) {
        $result = $this->static_db->query($query);

        if (!empty($result)) {
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

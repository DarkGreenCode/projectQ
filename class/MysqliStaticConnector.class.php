<?php if (__FILE__ == $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']) die("Direct access forbidden");
/**
 * Statyczna instancja konektora dla bazy danych MySQL.
 * @version     1.0
 * @package     projectQ
 * @author      SlimaK <em.slimak@gmail.com>
 * @license     https://creativecommons.org/licenses/by-nd/4.0/legalcode Creative Commons Attribution-NoDerivatives 4.0 International License
 * @copyright   Copyright (c) 2014, SlimaK
 */

class MysqliStaticConnector {

    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    }

    public static function init() {
        if(is_null(self::$instance)) {
            self::$instance = new MysqliStaticConnector();
        }
        return self::$instance;
    }

    public function __call($name, $args) {
        if(method_exists($this->connection, $name)) {
             return call_user_func_array(array($this->connection, $name), $args);
        } else {
             trigger_error('Unknown Method ' . $name . '()', E_USER_WARNING);
             return false;
        }
    }
}

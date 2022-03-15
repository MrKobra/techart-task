<?php
require_once "config.php";

class DataBase {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER , DB_PASS, DB_NAME);
    }

    public function get_posts($args) {
        $return = false;
        if($this->connection) {
            $query = mysqli_query($this->connection, self::get_sql($args));
            if(mysqli_num_rows($query) > 0) {
                $return = array();
                while ($item = mysqli_fetch_array($query)) {
                    array_push($return, $item);
                }
            }
        }
        return $return;
    }

    public function get_post($args) {
        $return = false;
        if($this->connection) {
            $sql = mysqli_query($this->connection, self::get_sql($args));
            if(mysqli_num_rows($sql) > 0) {
                $return = mysqli_fetch_array($sql);
            }
        }
        return $return;
    }

    private function get_sql($args) {
        $sql = "SELECT * FROM {$args["table"]}";

        if(array_key_exists("id", $args)) {
            $sql .= " WHERE id = {$args["id"]}";
        } else {
            if (array_key_exists("orderby", $args)) {
                $sql .= " ORDER BY {$args["orderby"]}";
                if (array_key_exists("order", $args)) {
                    $sql .= " {$args["order"]}";
                }
            }
            if (array_key_exists("count", $args)) {
                $sql .= " LIMIT {$args["count"]}";
                if (array_key_exists("page", $args)) {
                    $offset = ($args["page"] - 1) * $args["count"];
                    $sql .= " OFFSET {$offset}";
                }
            }
        }
        return $sql;
    }
}
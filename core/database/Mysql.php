<?php

namespace Devcom\Payamgir\Core\database;


class Mysql
{

    static protected Mysql|null $onlyInstance = null; //class instance
    static protected \PDO|null $conn = null; //database connection


    /**
     * @return Mysql
     * @throws \PDOException
     */
    public static function initSingleton(): self
    {
        if (is_null(self::$onlyInstance)) {
            self::$onlyInstance = new self();
        }

        return self::$onlyInstance;
    }

    /**
     * @return \PDO
     * @throws \PDOException
     */
    public static function connection(): \PDO
    {
        if (is_null(self::$onlyInstance)) {
            self::$onlyInstance = new self();
        }

        return self::$conn;
    }


    /**
     * @return void
     * @throws \PDOException
     */
    private function connect()
    {
        $connectionString = sprintf("mysql:host=%s;dbname=%s", mysqlconfig["host"], mysqlconfig["database"]);

        $this->conn = new \PDO($connectionString, mysqlconfig["username"], mysqlconfig["password"]);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

        $this->conn->query("set names utf8mb4");
    }

    public function update($table, $data, $where = [])
    {
        $columns = array_keys($data);
        $values = array_values($data);

        $where_keys = array_keys($where);
        $where_values = array_values($where);

        $where = (count($where) > 0) ? "where `" . implode("` = ? AND `", $where_keys) . "` = ?" : "";

        $sql = "update `$table` set `" . implode("` = ?, `", $columns) . "` = ? " . $where;

        $execute_array = array_merge($values, $where_values);

        $update = $this->conn->prepare("$sql");
        $update->execute($execute_array);

        return $update;
    }

    public function insert($table, $data)
    {
        $columns = array_keys($data);
        $values = array_values($data);

        $sql_fields = implode("`, `", $columns);
        $sql_values = implode(", ", array_fill(0, count($columns), "?"));

        $sql = "insert into `$table` ( `" . $sql_fields . "` ) values (" . $sql_values . ")";

        $execute_array = $values;
        $insert = $this->conn->prepare("$sql");
        $resInsert = $insert->execute($execute_array);

        return $resInsert;
    }

    public function delete($table, $where = [])
    {
        $where_keys = array_keys($where);
        $where_values = array_values($where);

        $where = "where `" . implode("` = ? AND `", $where_keys) . "` = ?";

        $sql = "delete from `$table` $where";

        $execute_array = $where_values;

        $delete = $this->conn->prepare("$sql");
        $delete->execute($execute_array);

        return $delete;
    }

    public function findBy($table, $field, $value, $fetchAll = true)
    {
        $sql = "SELECT * FROM `$table` WHERE `$field` = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([
            $value
        ]);

        if ($query->rowCount() > 0) {
            if ($fetchAll)
                return $query->fetchAll(\PDO::FETCH_ASSOC);
            else
                return $query->fetch(\PDO::FETCH_ASSOC);
        } else
            return false;
    }

    public function getLastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    protected function __construct()
    {
        $this->connect();
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("unabale to wakeup as only used instance");
    }

}
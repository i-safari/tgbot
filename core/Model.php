<?php

namespace Devcom\Payamgir\Core;

use Devcom\Payamgir\Core\database\Mysql;

abstract class Model
{
    public const ORDER_ASC = "asc";
    public const ORDER_DESC = "desc";

    /**
     * @param string|null $table
     * @return array<int, static::class>|false
     * @throws \Exception
     */
    public static function getAll(?string $table, bool $keyPair = false): array|false
    {
        $table = $table ?? static::table();

        $conn = Mysql::connection();
        $result = $conn->query("SELECT * FROM `$table`");

        if (!$result) {
            throw new \Exception("unable to query all data from $table");
        }

        if (static::class != self::class) {
            return $result->fetchAll(\PDO::FETCH_CLASS, static::class);
        }

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }


    abstract public static function table(): string;
}
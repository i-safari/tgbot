<?php

namespace Devcom\Payamgir\Core;

abstract class Cache
{
    protected ?array $cached_data;

    abstract public function read();

    abstract public function reload();

    final public function get(string $key): mixed
    {
        if (!isset($this->cached_data[$key])) {
            throw new \Exception("unable to find $key from " . static::class . " cache driver");
        }
    }
}
<?php

namespace Devcom\Payamgir\Model;

use Devcom\Payamgir\Core\Model;

class Setting extends Model
{
    public int $id;
    public string $property;
    public string $content;
    public ?string $description;

    public static function table(): string
    {
        return "settings";
    }
}
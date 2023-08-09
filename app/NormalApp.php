<?php

namespace Devcom\Payamgir\App;

use Devcom\Payamgir\Core\interface\AppKind;

//as mvc app
class NormalApp implements AppKind
{
    public function launch(): void
    {
    }

    public function appKind(): string
    {
        return self::class;
    }

}
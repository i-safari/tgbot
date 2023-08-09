<?php

namespace Devcom\Payamgir\Core;

use Devcom\Payamgir\Core\interface\AppKind;

class AppLauncher
{

    public function __construct()
    {

    }


    public function run(AppKind $app)
    {
        $app->launch();
    }
}
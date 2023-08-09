<?php

namespace Devcom\Payamgir\Core;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

abstract class App
{
    protected Logger $logger;

    public function __construct()
    {
        $this->initLogger();
    }

    private function initLogger(): void
    {
        $handler = new RotatingFileHandler(LogDIR."log");
        $log = new Logger("general");
        $log->pushHandler($handler);

        $this->logger = $log;
    }

}
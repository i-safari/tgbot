<?php

require "config.php";
require __DIR__ . '/vendor/autoload.php';

try {
    $launcher = new \Devcom\Payamgir\AppLauncher();
    $botApp = new apps\BotApp(BotToken);

    $launcher->run($botApp);
} catch (Exception $e) {
    \Devcom\Payamgir\lle($e);
}

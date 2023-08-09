<?php

namespace Devcom\Payamgir\Core\bot;

use Devcom\Payamgir\App\bot\Longman;

class Update
{
    public function __construct()
    {
        try {
            $telegram = new \Longman\TelegramBot\Telegram(BotToken, BotUsername);

            $request = \Longman\TelegramBot\Request::getInput();
            $update = new \Longman\TelegramBot\Entities\Update($request);

            //load cache
            //check update id from cache
            //db connection
            //load settings from db
            ## Route update?? or initialize conversation??

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            error_log($e->getMessage());
            echo $e->getMessage();
        }
    }
}
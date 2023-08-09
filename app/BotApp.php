<?php

namespace Devcom\Payamgir\App;

use Devcom\Payamgir\Core\App;
use Devcom\Payamgir\Core\interface\AppKind;
use Devcom\Payamgir\Core\Cache;
use Devcom\Payamgir\cache\MemoryCache;
use Devcom\Payamgir\cache\SettingCache;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class BotApp extends App implements AppKind
{
    private Cache $memoryCache;
    private Cache $settingCache;

    private Telegram $telegram;
    private Update $update;
    private string $requestInput;
    private array $request;

    public function __construct(private string $botToken)
    {
        parent::__construct();

        $this->settingCache = new SettingCache();
        $this->memoryCache = new MemoryCache();


        $this->prelaunch();
    }

    public function launch(): void
    {
        //check update id from cache
        //load settings from db
        ## Route update?? or initialize conversation??
        //runner
        // message type? chat type?
    }



    public function prelaunch()
    {
        try {
            $this->requestInput = \Longman\TelegramBot\Request::getInput();
            if (empty($this->requestInput)) {
                throw new TelegramException('Input is empty! The webhook must not be called manually, only by Telegram.');
            }

            $this->request = json_decode($this->requestInput, true);
            if (empty($this->request)) {
                throw new TelegramException('Invalid input JSON! The webhook must not be called manually, only by Telegram.');
            }

            $this->requestObject();

        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            exit;
        }
    }

    public function requestObject(){
        $this->telegram = new \Longman\TelegramBot\Telegram($this->botToken, BotUsername);
        $this->update = new \Longman\TelegramBot\Entities\Update($this->request, BotUsername);
    }

    public function appKind(): string
    {
        return self::class;
    }

}
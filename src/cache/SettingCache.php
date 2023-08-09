<?php

namespace Devcom\Payamgir\cache;

use Devcom\Payamgir\Core\Cache;
use Devcom\Payamgir\Model\Setting;

class SettingCache extends Cache
{
    protected bool $_read = false;

    public function __construct()
    {

    }

    public function read()
    {
        if ($this->_read){
            return;
        }

        //load setting model
        $settings = Setting::getAll();

        //set as cache
    }
}
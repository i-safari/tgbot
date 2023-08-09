<?php

namespace Devcom\Payamgir\Core\interface;


interface AppKind
{
    public function launch(): void;

    public function appKind(): string;
}
//enum AppKind: string
//{
//    case NormalApp = NormalApp::class;
//    case BotApp = BotApp::class;
//}
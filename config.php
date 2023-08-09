<?php
date_default_timezone_set("Asia/Tehran");

error_reporting(E_ALL); //Show All Error
ini_set('display_errors', 'on');
ini_set("log_errors", 1);
ini_set("error_log", LogDIR . "php-error-" . date("y-m-d") . ".log");
ini_set('max_execution_time', 3000);
ini_set('max_input_time', 3000);
ini_set('memory_limit ', "128M");

set_time_limit(300);
ignore_user_abort(true);


const DS = DIRECTORY_SEPARATOR;

const DIR = __DIR__ . DS;

const StorageDIR = "." . DS . "storage" . DS;
const LogDIR = StorageDIR . "log" . DS;

const BotID = "366407361";
const BotToken = "366407361:AAEVUNQ3KntjT8RL30eIXO0Bed7fhuUZJ5g"; // Your Telegram Bot Token Most be Define here
const BotUsername = "payamgir_robot"; //Your Telegram Bot Username(Optional)
const BotName = "payamgir_robot"; //Your Telegram Bot Profile Name(Optional)

const AdminIDs = [69221229]; //Your Telegram User id For Bot Known You As Her BOSS

const SessionPrefix = "payamgir_";

const UploadDIR = StorageDIR . "upload" . DS;
const DownloadDIR = StorageDIR . "upload" . DS;

const BotSecret = "abc";

const mysqlconfig = [
    "host" => "localhost",
    "database" => "bot",
    "username" => "root",
    "password" => "",
];
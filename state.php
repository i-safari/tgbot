<?php

function start(): void
{
    add_action("message", function(){

    });
}


$handlers = ["message" => [], "callback" => []];
function add_action(string $event, callable $handler): void
{
    global $handlers;

    $handlers[$event][] = $handler;
}
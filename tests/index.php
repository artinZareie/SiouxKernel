<?php

require_once "../vendor/autoload.php";

use SiouxKernel\HTTP\Manager;
use \SiouxKernel\Factories\EventLoopFactory;
use \SiouxKernel\Tools\EventLoop;

$loop = EventLoopFactory::make(
    function (array $initialState, EventLoop $loop) {
        return $loop->getState()['turn'];
    },
    function (array $initialState, EventLoop $loop) {
        $n = $initialState['number'];
        if ($n % 2 == 0)
            Manager::send($n, PHP_EOL);
        $loop->setState([
            "number" => $n + 1
        ]);
        if ($n >= 10) {
            $loop->setState([
                "turn" => false
            ]);
            $loop->break();
        }
    },
    [
        "turn" => true,
        "number" => 1
    ]
);

Manager::debug($loop);

$loop->run();
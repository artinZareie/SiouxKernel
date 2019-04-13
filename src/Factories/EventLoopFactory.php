<?php

namespace SiouxKernel\Factories;

use Closure;
use SiouxKernel\Tools\EventLoop;

class EventLoopFactory
{
    /**
     * @param Closure $condition
     * @param Closure $task
     * @param array $initialState
     * @return EventLoop
     */
    public static function make(Closure $condition, Closure $task, array $initialState): EventLoop
    {
        return new EventLoop($condition, $task, $initialState);
    }
}
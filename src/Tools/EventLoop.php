<?php


namespace SiouxKernel\Tools;

use \Closure;

class EventLoop
{
    private $condition;
    private $task;
    private $state = [];
    private $break;
    private $continue;

    /**
     * EventLoop constructor.
     * @param Closure $condition
     * @param Closure $task
     * @param array $initialState
     */
    public function __construct(Closure $condition, Closure $task, array $initialState = [])
    {
        $this->state = $initialState;
        $this->condition = $condition;
        $this->task = $task;
    }

    /**
     *
     */
    public function run()
    {
        while (($this->condition)($this->state, $this)) {
            ($this->task)($this->state, $this);
            if ($this->break) {
                $this->break = false;
                break;
            }
            if ($this->continue) {
                $this->continue = false;
                continue;
            }
        }
    }

    /**
     *
     */
    public function kill()
    {
        $this->condition = function () {
            return false;
        };
    }

    public function setState(array $state): void
    {
        foreach ($state as $key => $value) {
            $this->state[$key] = $value;
        }
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * break while
     */
    public function break(): void
    {
        $this->break = true;
    }

    /**
     * continue while
     */
    public function continue(): void
    {
        $this->break = true;
    }

}
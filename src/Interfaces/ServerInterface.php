<?php


namespace SiouxKernel\Interfaces;


interface ServerInterface
{
    public function handler(): \Closure;
}
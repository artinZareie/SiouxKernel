<?php


namespace SiouxKernel\Kernel;


class Terminal
{
    /**
     * @param string $command
     * @return string
     */
    public static function run(string $command): string
    {
        system($command, $ret);
        return $ret;
    }
}
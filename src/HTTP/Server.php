<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\DirHelper;

class Server
{
    public static function createServer()
    {
        var_dump(DirHelper::processDirectory());
        die();
    }
}
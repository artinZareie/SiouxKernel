<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\DirHelper;

class Server
{
    /***
     * @uses for development
     * @version 1.0.0
     * @notice not for production use
     */
    public static function createServer()
    {
        Manager::devServer(DirHelper::processDirectory());
    }
}
<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\Payload;

class Manager
{
    public static function requestURI(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function requestProtocol(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    public static function requestCameFrom(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public static function requestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function serverInformation(): array
    {
        return $_SERVER;
    }
    
    public static function sessions(): array
    {
        return $_SESSION;
    }

    public static function cookies(): array
    {
        return $_COOKIE;
    }

    public static function postRequests(): array
    {
        return $_POST;
    }

    public static function getRequests(): array
    {
        return $_GET;
    }

    public static function phpRequests(): array
    {
        return Payload::requestDecoder(file_get_contents('php://input'));
    }

    public static function requests(): array
    {
        return $_REQUEST;
    }

    public static function die(string $status): void
    {
        die($status);
    }

    public static function end(string $status = ''): void
    {
        exit($status);
    }

    public static function debug($data): void
    {
        var_dump($data);
    }

    public static function send(string $data): void
    {
        echo $data;
    }
}
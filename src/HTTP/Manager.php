<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\Payload;

class Manager
{
    /**
     * @return string
     */
    public static function requestURI(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @return string
     */
    public static function requestProtocol(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    /**
     * @return string
     */
    public static function requestCameFrom(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * @return string
     */
    public static function requestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return array
     */
    public static function serverInformation(): array
    {
        return $_SERVER;
    }

    /**
     * @return array
     */
    public static function sessions(): array
    {
        return $_SESSION;
    }

    /**
     * @return array
     */
    public static function cookies(): array
    {
        return $_COOKIE;
    }

    /**
     * @return array
     */
    public static function postRequests(): array
    {
        return $_POST;
    }

    /**
     * @return array
     */
    public static function getRequests(): array
    {
        return $_GET;
    }

    /**
     * @return array
     */
    public static function phpRequests(): array
    {
        return Payload::requestDecoder(file_get_contents('php://input'));
    }

    /**
     * @return array
     */
    public static function requests(): array
    {
        return $_REQUEST;
    }

    /**
     * @param string $status
     */
    public static function die(string $status): void
    {
        die($status);
    }

    /**
     * @param string $status
     */
    public static function end(string $status = ''): void
    {
        exit($status);
    }

    /**
     * @param $data
     */
    public static function debug($data): void
    {
        var_dump($data);
    }

    /**
     * @param string $data
     */
    public static function send(string $data): void
    {
        echo $data;
    }
}
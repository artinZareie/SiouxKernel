<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\Payload;

class Manager
{

    protected static $ob_status = false;

    public static function sleep(int $seconds): void
    {
        sleep($seconds);
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     */
    public static function obEndFlush(): void
    {
        if (self::$ob_status)
            self::obEndFlush();
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     */
    public static function obFlush(): void
    {
        if (self::$ob_status)
            ob_flush();
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     * @return string
     */
    public static function cleanPageWithData(): string
    {
        if (self::$ob_status)
            return ob_get_clean();
        return "";
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     */
    public static function cleanPage(): void
    {
        if (self::$ob_status)
            ob_clean();
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     * @param callable|null $callable
     */
    public static function obStarter(callable $callable = null): void
    {
        ob_start($callable);
        self::$ob_status = true;
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     */
    public static function sendRendered(): void
    {
        flush();
    }

    /**
     * @param string $header
     * @param string $replace
     */
    public static function setHeader(string $header, string $replace = ''): void
    {
        header($header, $replace);
    }

    /**
     * @see https://www.php.net/manual/en/function.ob-start.php
     */
    public static function disableOb(): void
    {
        ini_set('output_buffering', 'off');
        ini_set('zlib.output_compression', false);
        ini_set('implicit_flush', true);
        ob_implicit_flush(true);
        while (ob_get_level() > 0) {
            $level = ob_get_level();
            ob_end_clean();
            if (ob_get_level() == $level) break;
        }
    }

    /**
     * @param string|null $dir
     * @param int $port
     */
    public static function devServer(string $dir = null, int $port = 8000): void
    {
        $cmd = "php -S localhost:${port}";
        if (!is_null($dir) && $dir !== "")
            $cmd .= " -t ${dir}";

        self::setHeader("Content-type: text/plain");

        self::disableOb();
        system($cmd);
    }

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
    public static function die(string $status = ''): void
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
     * @param ...$data
     */
    public static function debug(...$data): void
    {
        foreach ($data as $item) {
            var_dump($item);
        }
    }

    /**
     * @param string ...$data
     */
    public static function send(string ...$data): void
    {
        foreach ($data as $item) {
            echo $item;
        }
    }
}
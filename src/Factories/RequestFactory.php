<?php


namespace SiouxKernel\Factories;


use SiouxKernel\HTTP\Request;

class RequestFactory
{
    public static function make(): Request
    {
        return new Request();
    }
}
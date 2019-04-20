<?php


namespace SiouxKernel\HTTP;


use SiouxKernel\Tools\ArrayHelper;

class Request
{
    private $method;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->method = $this->getRequestType();
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return Manager::requestMethod();
    }

    /**
     * @return array
     */
    public function all(): array
    {
        switch ($this->method) {
            case "GET":
                return Manager::getRequests();
                break;
            case "POST":
                return Manager::postRequests();
                break;
            default:
                return Manager::phpRequests();
                break;
        }
    }

    /**
     * @param array $filters
     * @return array
     */
    public function except(array $filters): array
    {
        return ArrayHelper::except($this->all(), $filters);
    }

    /**
     * @param array $filters
     * @return array
     */
    public function only(array $filters): array
    {
        return ArrayHelper::only($this->all(), $filters);
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        return Manager::requestURI();
    }
}
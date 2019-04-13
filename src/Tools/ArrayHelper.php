<?php


namespace SiouxKernel\Tools;


class ArrayHelper
{
    /**
     * @param array $values
     * @param array $filters
     * @return array
     */
    public static function except(array $values, array $filters)
    {
        return array_filter($values, function ($i, $key) use ($filters) {
            return !in_array($key, $filters);
        }, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * @param array $values
     * @param array $filters
     * @return array
     */
    public static function only(array $values, array $filters)
    {
        return array_filter($values, function ($i, $key) use ($filters) {
            return in_array($key, $filters);
        }, ARRAY_FILTER_USE_BOTH);
    }
}
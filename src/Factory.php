<?php


namespace Miao;


class Factory
{
    private function __construct()
    {
        echo 'error';
    }

    public static function make(array $config = [])
    {
        return new Api\Api($config);
    }
}

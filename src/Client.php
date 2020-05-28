<?php

namespace YandexDisk;


use YandexDisk\Builder;


class Client
{
    private $builder;

    public function __construct($token)
    {
        $this->builder = new Builder($token);
    }

    public function getInfo()
    {
        $url = "";
        return $this->builder->getRequest($url);
    }
}
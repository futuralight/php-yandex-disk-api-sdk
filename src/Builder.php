<?php

namespace YandexDisk;


use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;


class Builder
{
    private const API_URL = 'https://cloud-api.yandex.net/v1/disk/';
    private const GET_PREFIX = '/?';
    private $guzzle_client;

    public function __construct($token)
    {
        $this->guzzle_client = new GuzzleClient();
        $this->guzzle_client->setDefaultOption('headers/Authorization', 'OAuth ' . $token);
    }

    public function getRequest(string $method, array $params = null)
    {
        $request_url = self::API_URL . $method . self::GET_PREFIX . $params ? http_build_query($params) : '';
        $response = $this->guzzle_client->get($request_url);
        return $response->getBody();
    }

    public function postRequest(string $method, array $params = null)
    {
        $request_url = self::API_URL . $method . self::GET_PREFIX . $params ? http_build_query($params) : '';
        $response = $this->guzzle_client->post($request_url, $params);
        return $response->getBody();
    }
}

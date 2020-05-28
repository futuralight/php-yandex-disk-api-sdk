<?php

namespace YandexDisk;


use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;


class Builder
{
    private const API_URL = 'https://cloud-api.yandex.net/v1/disk/';
    private const GET_PREFIX = '?';
    private $token;
    private $guzzle_client;

    public function __construct($token)
    {
        $this->guzzle_client = new GuzzleClient();
        $this->token = $token;
    }

    public function getRequest(string $method, array $params = null)
    {
        $request_url = self::API_URL . $method . self::GET_PREFIX;
        if ($params !== null) {
            $request_url .= http_build_query($params);
        }
        $response = $this->guzzle_client->request('GET', $request_url, ['headers' => ['Authorization' => "OAuth {$this->token}"]]);
        return $response->getBody();
    }

    public function postRequest(string $method, array $params = null)
    {
        $request_url = self::API_URL . $method;
        $response = $this->guzzle_client->post($request_url, $params);
        return $response->getBody();
    }
}

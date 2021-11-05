<?php

namespace App\HttpServices;

abstract class HttpServiceBase
{
    protected $client;

    protected $request;

    protected $response;

    protected $responseData;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client;
        $this->request = $this->prepareRequest();
    }
    
    public function getData(): array
    {
        try {
            $this->response = $this->client->send($this->request);
            $this->validateResponse();           
        } catch (\Exception $e) {
            // Обработка ошибок
            // Логи
        }

        return $this->responseData;
    }

    abstract protected function prepareRequest(): \GuzzleHttp\Psr7\Request;
    
    abstract protected function validateResponse();
}
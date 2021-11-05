<?php

namespace App\HttpServices;

class DiscountDataHttpService extends HttpServiceBase
{
    protected function validateResponse()
    {
        $this->responseData['bonusCard'] = [
            'number' => '',
            'balance' => 0,
        ];

        $this->responseData['personalPromoCodes'] = [];

        $rawData =$this->response
            ->getBody()
            ->getContents();
        
        if ($this->response->getStatusCode() !== 200) {
            throw new \Exception($rawData, $this->response->getStatusCode());
        }
        
        $responseData = json_decode($rawData, true);
        
        if (isset($responseData['bonusCard'])
            && !empty($responseData['bonusCard']['number'])
            && filter_var($responseData['bonusCard']['balance'], FILTER_VALIDATE_INT) >= 0
        ) {
            $this->responseData['bonusCard'] = $responseData['bonusCard'];
        }

        if (isset($responseData['personalPromoCodes'])) {
            foreach ($responseData['personalPromoCodes'] as $personalPromoCode) {
                if (!empty($personalPromoCode['id'] && !empty($personalPromoCode['displayValue']))) {
                    $this->responseData['personalPromoCodes'][] = $personalPromoCode;
                }
            }
        }
    }
    
    protected function prepareRequest(): \GuzzleHttp\Psr7\Request
    {
        return new \GuzzleHttp\Psr7\Request('GET', 'http://fake_server:3000/discountData');
    }
}
<?php
namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahService {

    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client){
        // settings to call any server

        $this->request_client = $request_client;
        $this->base_url =env('fatoorah_base_url');
        $this->headers = [
            'Content-Type' => 'application/json',
            'authorization' => 'Bearer '.env('fatoorah_test_token')
        ];

    }

    public function buildRequest($url ,$method ,$data = []){

        $request = new Request($method, $this->base_url . $url ,$this->headers);

        if(! $data){
            return false;
        }
        $response = $this->request_client->send($request, [
            'json' => $data
        ]);

        if($response->getStatusCode() != 200){
            return false;
        }

        $response = json_decode($response->getBody() , true);
        return $response;


    }

    public function sendPayment($data){

        $response = $this->buildRequest('/v2/SendPayment' , 'POST' ,  $data);
        return $response;

    }

    public function getPaymentStatus($data){

        return $response = $this->buildRequest('/v2/getPaymentStatus' , 'POST' ,  $data);

    }



}

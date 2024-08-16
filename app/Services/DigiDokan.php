<?php
namespace App\Services;
use App\Models\Shipper;
class DigiDokan {
    private $http;

    public $logistics = [
        3 => 'Leopards',
        9 => 'Swift',
        5 => 'trax',
        15 => 'M&P',
        13 => 'BlueEx',
    ];

    public function getLogisticName($id)
    {
        return $this->logistics[$id];
    }

    public function __construct()
    {
        $this->http = new \GuzzleHttp\Client([
            'base_uri' => 'https://dev.digidokaan.pk/api/v1/digidokaan/',
            'headers' => ['Accept' => 'application/json']
        ]);
    }

    // Login to DigiDokan

    public function login()
    {
        $shipper = Shipper::find(1);
        if($shipper){
            $config = json_decode($shipper->config);
            if($config->token) {
                return $config->token;
            }
        }
        $response = $this->http->post('auth/login', [
            'form_params' => [
                'phone' => env('DIGIDOKAAN_PHONE', $config->phone),
                'password' => env('DIGIDOKAAN_PASSWORD',$config->password)
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                if($shipper){
                    $config = json_decode($shipper->config);
                    $config->token = $res->token;
                    $shipper->config = json_encode($config);
                    $shipper->save();
                }
                return $res->token;
            }
            throw new \Exception($res->error);
        }
    }

    public function refreshToken(){
        $response = $this->http->post('auth/refresh_token', [
            'headers' => [
                'Authorization' => 'Bearer '. $token
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                return $res->token;
            }
            throw new \Exception($res->error);
        }
    }

    // get all cities 
    public function getCities($params)
    {
        $token = $this->login();
        $response = $this->http->post('cities', [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'form_params' => $params
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                return $res->data;
            }
            throw new \Exception($res->error);
        }
    }

    // book a shipment
    public function bookShipment($params){
        $token = $this->login();
        $response = $this->http->post('order-book', [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'form_params' => $params,
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                return $res->data;
            }
            throw new \Exception($res->error);
        }
    }
}
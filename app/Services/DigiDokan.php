<?php
namespace App\Services;

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

    public function login($phone, $password)
    {
        $response = $this->http->post('auth/login', [
            'form_params' => [
                'phone' => env('DIGIDOKAAN_PHONE'),
                'password' => env('DIGIDOKAAN_PASSWORD')
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
}
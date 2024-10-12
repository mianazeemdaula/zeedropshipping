<?php
namespace App\Services;
use App\Models\Shipper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class DigiDokan {
    private \GuzzleHttp\Client $http;
    public static $logistics = [
        3 => 'Leopards',
        9 => 'Swift',
        5 => 'Trax',
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
            'base_uri' => env('APP_ENV') === 'local' ? 'https://dev.digidokaan.pk/api/v1/digidokaan/': 'https://digidokaan.pk/api/v1/digidokaan/',
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
            Log::info('Digidokan login response: '.$this->http->getConfig('base_uri'));
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
        $shipper = Shipper::find(1);
        if($shipper){
            $config = json_decode($shipper->config);
            // remove token
            $config->token = null;
            $shipper->config = json_encode($config);
            $shipper->save();
        }
        $token = $this->login();
        return $token;
    }

    // get all cities 
    public function getCities($params)
    {
        $token = $this->login();
        // check in cache
        $key = 'digi_cities_'.$params['shipment_type']."_".$params['gateway_id'];
        $cities = Cache::get($key);
        if($cities) {
            return $cities;
        }
        $response = $this->http->post('cities', [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'form_params' => $params
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                Cache::put($key, $res->data, now()->addHours(24));
                return $res->data;
            }else if($res->code == 401) {
                $token = $this->refreshToken();
                return $this->getCities($params);
            }
            throw new \Exception($res);
        }
    }

    // book a shipment
    public function bookShipment($params){
        // dd( $params);
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
            }else if($res->code == 401) {
                $token = $this->refreshToken();
                return $this->bookShipment($params);
            }
            throw new \Exception($res->error);
        }
    }

    // get shipment tracking

    public function getShipmentTracking($params){
        $token = $this->login();
        $response = $this->http->post('get-order-tracking', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
            'form_params' => $params,
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                return $res->status;
            }else if($res->code == 401) {
                $token = $this->refreshToken();
                return $this->getShipmentTracking($params);
            }
            throw new \Exception($res->error);
        }
    }

    public function downloadLoadSheet($params){
        $token = $this->login();
        $response = $this->http->post('download-load-sheet', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
            'form_params' => $params,
        ]);
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                return $res->data;
            }else if($res->code == 401) {
                $token = $this->refreshToken();
                return $this->downloadLoadSheet($params);
            }
            throw new \Exception($res->error);
        }
    }

    public function getPickupAddress($gatewayId){
        $token = $this->login();
        // check in cache
        $key = 'digi_pickup_address_'.$gatewayId;
        $addresses = Cache::get($key);
        if($addresses) {
            return $addresses;
        }
        $response = $this->http->post('get-pickUp-address', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
            'form_params' => [
                'gateway_id' => $gatewayId,
                'source' => 'core_api'
            ],
        ]);
        
        if($response->getStatusCode() == 200) {
            $res =  json_decode($response->getBody()->getContents());
            if($res->code == 200) {
                Cache::put($key, $res->data, now()->addHours(24));
                return $res->data;
            }else if($res->code == 401) {
                $token = $this->refreshToken();
                return $this->getPickupAddress($gatewayId);
            }
            throw new \Exception($res->error);
        }
    }
}
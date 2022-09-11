<?php
/**
 * Created by PhpStorm.
 * User: Flavian T Machimbirike
 * Date: 25-Oct-18
 * Time: 11:03 AM
 */

namespace App\Business\Services;

define('MAX_EXECUTION_TIME', '6000');
ini_set('max_execution_time', MAX_EXECUTION_TIME);

class THttpClientWrapper{

    public function __construct(){
    }


    public function getRequest($url){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL                 => $url,
            CURLOPT_RETURNTRANSFER      => true,
            CURLOPT_ENCODING            => '',
            CURLOPT_MAXREDIRS           => 10,
            CURLOPT_TIMEOUT             => 0,
            CURLOPT_FOLLOWLOCATION      => true,
            CURLOPT_HTTP_VERSION        => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST       => 'GET',
            CURLOPT_HTTPHEADER          => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);;
    }

    public function postRequest($url,$data){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL                 => $url,
            CURLOPT_RETURNTRANSFER      => true,
            CURLOPT_ENCODING            => '',
            CURLOPT_MAXREDIRS           => 10,
            CURLOPT_TIMEOUT             => 0,
            CURLOPT_FOLLOWLOCATION      => true,
            CURLOPT_HTTP_VERSION        => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST       => 'POST',
            CURLOPT_POSTFIELDS          =>  json_encode($data),
            CURLOPT_HTTPHEADER          => array(
                            'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);;

    }


    public function putRequest($url,$data){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL                 => $url,
            CURLOPT_RETURNTRANSFER      => true,
            CURLOPT_ENCODING            => '',
            CURLOPT_MAXREDIRS           => 10,
            CURLOPT_TIMEOUT             => 0,
            CURLOPT_FOLLOWLOCATION      => true,
            CURLOPT_HTTP_VERSION        => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST       => 'PATCH',
            CURLOPT_POSTFIELDS          =>  json_encode($data),
            CURLOPT_HTTPHEADER          => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);;
    }

    public function deleteRequest($url,$data){

    }

    public function patchRequest($url,$data){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL                 => $url,
            CURLOPT_RETURNTRANSFER      => true,
            CURLOPT_ENCODING            => '',
            CURLOPT_MAXREDIRS           => 10,
            CURLOPT_TIMEOUT             => 0,
            CURLOPT_FOLLOWLOCATION      => true,
            CURLOPT_HTTP_VERSION        => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST       => 'PATCH',
            CURLOPT_POSTFIELDS          =>  json_encode($data),
            CURLOPT_HTTPHEADER          => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);;
    }



}

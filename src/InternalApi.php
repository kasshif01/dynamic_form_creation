<?php

namespace Src;


class InternalApi
{
    /**
     * @param string $method
     * @param string $route
     * @param array $payload
     * @return mixed
     */
    public static function send(string $route, string $method, array $payload=[]){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('INTERNAL_API').$route,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
}
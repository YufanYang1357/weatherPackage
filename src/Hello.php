<?php 

/*
 * (c) Yufan Yang <yangy49@miamioh.edu>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace liererkt\MyFirstPackage;
require "pass.php";

class Hello
{
    use GuzzleHttp\Client;

    public function say($name)
    {
        return "Hello, $name!";
    }

    public function getCurrentWeather($zip){
            if ($APIKEY == "") {
                return "API KEY NOT DEFINED";
            }
            $country="US";
            $uri = "https://api.openweathermap.org/data/2.5/weather?zip=$zip,$country&units=imperial&appid=$APIKEY";
            $client = new Client([
                'base_uri' => $uri,
                'timeout'  => 2.0,
            ]);
            
            try {
            $response = $client->request('GET',"");
            $body = (string) $response->getBody();
            $jbody = json_decode($body, true);
            if (!$jbody) {
                return "Fail";
                }
            $temp = json_decode(json_encode($jbody));
            return $temp;
            } catch (Exception $e) {
                return "Fail";
            }
    }
}

?>
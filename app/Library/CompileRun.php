<?php
namespace App\Library;

class CompileRun{

function __construct() {
   
    
}

/**
 * parms is an array wjich expects time, memory, file 
 * example 
 * @param type $params
 */

function run($config){
// Get cURL resource
$curl = curl_init();
// Seting some options
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => "https://api.runmycode.online/run/".$config['language'],
CURLOPT_POST => 1,
CURLOPT_CAINFO => 'cacert.pem',
CURLOPT_SSL_VERIFYPEER => 'true',
CURLOPT_ENCODING => 'UTF-8',
CURLOPT_POSTFIELDS => $config['source'],

CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    
    "x-api-key:".env('X-API-KEY')
  )

));

return json_decode(curl_exec($curl), true);
}
}

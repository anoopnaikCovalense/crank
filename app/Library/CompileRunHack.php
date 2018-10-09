<?php
namespace App\Library;
//Endpoints Of Hackerearth API
$endpoint_compile = "https://api.hackerearth.com/v3/code/compile/";
$endpoint_run = "https://api.hackerearth.com/v3/code/run/";
class CompileRunHack{

function __construct() {
   
    
}

/**
 * parms is an array wjich expects time, memory, file 
 * example 
 * @param type $params
 */
function compile($hackerearth,$config){
// Get cURL resource
$curl = curl_init();
// Seting some options
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://api.hackerearth.com/v3/code/compile/',
CURLOPT_POST => 1,
CURLOPT_CAINFO => 'cacert.pem',
CURLOPT_SSL_VERIFYPEER => 'true',
CURLOPT_ENCODING => 'UTF-8',
CURLOPT_POSTFIELDS => array(
                    'client_secret' => $hackerearth['client_secret'],
                    'time_limit' => $hackerearth['time_limit']||$config['time'],
                    'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                    'source' => $config['source'],
                    'input' => $config['input'],
                    'lang' => $config['language']
)
));
echo "compile";
// Send the request & returning response 
return json_decode(curl_exec($curl), true);
}

/**
 * 
 */
function run($hackerearth,$config){
// Get cURL resource
$curl = curl_init();
// Seting some options
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://api.hackerearth.com/v3/code/run/',
CURLOPT_POST => 1,
CURLOPT_CAINFO => 'cacert.pem',
CURLOPT_SSL_VERIFYPEER => 'true',
CURLOPT_ENCODING => 'UTF-8',
CURLOPT_POSTFIELDS => array(
                    'client_secret' => $hackerearth['client_secret'],
                    'time_limit' => $hackerearth['time_limit']||$config['time'],
                    'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                    'source' => $config['source'],
                    'input' => $config['input'],
                    'lang' => $config['language']
)
));
// Send the request & returning response 

return json_decode(curl_exec($curl), true);
}
}

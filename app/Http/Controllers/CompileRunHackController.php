<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\CompileRunHack;
use Symfony\Component\HttpFoundation\Response;


class CompileRunHackController extends Controller
{
    
    public function comp_run()
    {


        $hackerearth = Array(
            'client_secret' => '744febc349b91372c7297a544700e223df192413',
            'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
            'memory_limit' => '262144'  //(OPTIONAL) Memory Limit (MAX = 262144 [256 MB])
        );

        $config = Array();
        $config['time'] = '5';        //(OPTIONAL) Your time limit in integer and in unit seconds
        $config['memory'] = '262144'; //(OPTIONAL) Your memory limit in integer and in unit kb
        $config['source'] = $_POST['code'];    //(REQUIRED) Your properly formatted source code for which you want to use hackerEarth api
        $config['input'] = '';        //(OPTIONAL) Properly Formatted Input against which you have to test your source code, leave this empty if you are using file
        $config['language'] = strtoupper($_POST['lang']);   //(REQUIRED) Choose any one of the below
            $response=array(
            "status"=>"OK",
            "output"=>"Your output is here!!",
            "body"=>array("run_status"=>array("compile_status"=>"OK","stderr"=>"","status_detail"=>"OK")));
            return  $response;

        if ($response['compile_status'] == "OK") {
            return response()->json(['message' => 'success', 'status' => Response::$statusTexts['200'], 'code' => Response::HTTP_OK, 'body' => $response, 'output' => $response['run_status']['output']], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'error', 'status' => Response::$statusTexts['400'], 'code' => Response::HTTP_BAD_REQUEST, 'body' => $response, 'output' => $response['run_status']['status_detail']], Response::HTTP_BAD_REQUEST);
        }
    }
}

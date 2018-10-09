<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\CompileRun;
use Symfony\Component\HttpFoundation\Response;

class CompileRunController extends Controller
{
    /**
     * 3rd party API call for code compilation and run
     * @return \Illuminate\Http\JsonResponse
     */
    public function comp_run()
    {

        //Feeding Data Into Hackerearth API

        $config = Array();
        $config['source'] = $_POST['code'];    //(REQUIRED) Your properly formatted source code for which you want to use hackerEarth api
        $config['language'] = strtolower($_POST['lang']);   

        //Sending request to the API to compile and run and record JSON responses

        $test = new CompileRun();
        $response = $test->run($config); // Use this $response the way you want , it consists data in PHP Array
        //   $response=array(
        //     "status"=>"OK",
        //     "output"=>"Your output is here!!",
        //     "body"=>array("run_status"=>array("compile_status"=>"OK","stderr"=>"","status_detail"=>"OK")));
        //     return  $response;

        if ($response['status'] == "Successful") {
            return response()->json(['message' => 'success', 'status' => Response::$statusTexts['200'], 'code' => Response::HTTP_OK, 'body' => $response, 'output' => $response['stdout']], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'error', 'status' => Response::$statusTexts['400'], 'code' => Response::HTTP_OK, 'body' => $response, 'output' =>$response['error']], Response::HTTP_OK);
        }
       
    }
}

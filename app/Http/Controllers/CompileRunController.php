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
        $config['source'] = $_POST['code'];   
        $config['language'] = strtolower($_POST['lang']);   

        $test = new CompileRun();
       
        if ($response['status'] == "Successful") {
            return response()->json(['message' => 'success', 'status' => Response::$statusTexts['200'], 'code' => Response::HTTP_OK, 'body' => $response, 'output' => $response['stdout']], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'error', 'status' => Response::$statusTexts['400'], 'code' => Response::HTTP_OK, 'body' => $response, 'output' =>$response['error']], Response::HTTP_OK);
        }
       
    }
}

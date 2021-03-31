<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;
use App\Http\Requests\CheckNumberInputRequest;
use App\Services\CheckService;

class BaseController extends Controller
{   
    /**
     * success response
     *
     * @param array $data
     * @return response json
     */
    public function respond(array $data=[]) {
        return response()->json([
            'data' => $data,
        ]);
    }

    /**
     * respond error 
     *
     * @param Exception $e
     * @return Response Json
     */
    public function respondError($e) {
        return response()->json([
            'error' => 'true',
            'message' => $e->getMessage(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}

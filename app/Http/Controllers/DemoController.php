<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;
use App\Http\Requests\CheckNumberInputRequest;
use App\Services\CheckService;

class DemoController extends BaseController
{   
    /**
     * @var CheckService
     */
    private $checkService;

    /**
     * load dependencies
     *
     * @param CheckService $checkService
     */
    public function __construct(CheckService $checkService) {
        $this->checkService = $checkService;
    }

    /**
     * handle request for checking input and return corresponding string.
     * @param Request $request
     * @return Response json
     */
    public function doSomeWork(CheckNumberInputRequest $request) {
        try {
            $input = $request->input('number');
            $result = $this->checkService->check($input);
            $response = [
                'value' => $result,
            ];

            return $this->respond($response);
        } catch(Exception $e) {
            return $this->respondError($e);
        }
    }
}

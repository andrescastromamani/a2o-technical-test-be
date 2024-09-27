<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Services\StringValueService;
use App\Http\Requests\StringValueRequest;

class StringValueController extends Controller
{
    protected $stringValueService;

    public function __construct(StringValueService $stringValueService)
    {
        $this->stringValueService = $stringValueService;
    }

    public function maxValue(StringValueRequest $request)
    {
        $input = $request->input('input');
        $output = $this->stringValueService->maxValue($input);
        return ApiResponseClass::sendResponse(['output' => $output], '', 200);
    }
}

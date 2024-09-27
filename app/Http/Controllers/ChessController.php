<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\ChessRequest;
use App\Http\Requests\StringValueRequest;
use App\Services\ChessService;
use App\Services\StringValueService;

class ChessController extends Controller
{
    protected $chessService;

    public function __construct(ChessService $chessService)
    {
        $this->chessService = $chessService;
    }

    public function queensAttack(ChessRequest $request)
    {
        $validatedData = $request->validated();
        $n = $validatedData['n'];
        $k = $validatedData['k'];
        $rq = $validatedData['rq'];
        $cq = $validatedData['cq'];
        $obstacles = $validatedData['obstacles'] ?? [];
        $output = $this->chessService->queensAttack($n, $k, $rq, $cq, $obstacles);
        return ApiResponseClass::sendResponse(['output' => $output], '', 200);
    }
}

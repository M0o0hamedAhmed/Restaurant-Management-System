<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaginatedResource;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{

    public function sendResponse($result, $message, $code = 200): JsonResponse
    {

        $response = [
            'data' => $result,
            'status' => true,
            'message' => $message
        ];
        return Response()->json($response, $code);
    }

    public function sendError($error, $errorMessages =[], $code = 422): JsonResponse
    {

        $response = [
            'status' => false,
            'message' => $error
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return Response()->json($response, $code);
    }

    public function sendPaginatedResponse($result, $message, $code = 200): JsonResponse
    {

        $response = [
            'status' => true,
            'data' => $result,
            'pagination' => $this->getPagination($result),
            'message' => $message
        ];
        return Response()->json($response, $code);
    }

    public function getPagination($result)
    {
        return PaginatedResource::make($result);
    }
}

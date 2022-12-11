<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //public function getCategory(){
    /**
     * Success ko lagi response
     */
    public function sendSuccessResponse($data, $message)
    {
        $response = [
            'success' => true,
            // 'data' => [
            //     'category1',
            //     'category2'
            // ],
            // 'message' => 'Category fetchded successulyy!',
            'data' => $data,
            'message' => $message, 
        ];
        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'category1',
        //         'category2'
        //     ],
        //     'message' => 'Category fetchded successulyy!'
        // ], 200);

        return response()->json($response, 200);
    }

    /**
     * Error ko lagi response
     */
    public function sendErrorResponse($errorMessages = [], $message, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Request;
use Illuminate\Routing\Controller as BaseController;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function render(string $errorCode,$message, int $statusCode = 200,
    $responseData = [])
    {
        return response()->json([
            'status' => $errorCode,
            'message' => $message,
            'response' => $responseData],
            $statusCode);
    }

}


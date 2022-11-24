<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PurchaselyController extends Controller
{
    public function index(request $request)
    {
        $this->request = $request;
        Log::info($this->request->all());

        return response()->json([
            'status' => 'success'
        ], 200);
    }


}

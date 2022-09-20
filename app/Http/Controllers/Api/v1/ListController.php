<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Way;
use App\Models\Area;
use App\Models\Feel;
use App\Models\Style;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function styles()
    {
        $data = Style::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function feels()
    {
        $data = Feel::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function ways()
    {
        $data = Way::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function areas()
    {
        $data = Area::where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}

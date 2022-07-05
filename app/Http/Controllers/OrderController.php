<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public static function test(Request $request)  {

        return response()->json(DB::connection()->select('select * from test')->get());
    }
    
}

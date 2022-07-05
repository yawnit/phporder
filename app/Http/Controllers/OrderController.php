<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{

    public static function test(Request $request)  {

        return response()->json(DB::connection()->select('select * from test')->get());
    }


    public static function create(Request $request)  {

        $request->validate([
            'phone' => 'required|int',
            'fio' => 'required|string',
            'amount' => 'required|int',
            'address' => 'required|string',
        ]);

        $date = Carbon::now();

        DB::table('order')->insert([
            'phone' => $request->phone,
            'fio' => $request->fio,
            'amount' => $request->amount,
            'address' => $request->address,
            'date' => $date,
        ]);

        return $date;

        // return response()->json(DB::connection()->select('select * from test')->get());
    }

}

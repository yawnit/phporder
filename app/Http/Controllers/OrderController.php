<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{

    public static function create(Request $request)  {

        $request->validate([
            'phone' => 'required|int',
            'fio' => 'required|string',
            'amount' => 'required|int',
            'address' => 'required|string',
        ]);

        $date = Carbon::now();

        $id = DB::table('order')->insertGetId([
            'phone' => $request->phone,
            'fio' => $request->fio,
            'amount' => $request->amount,
            'address' => $request->address,
            'date' => $date,
        ]);
        
        return response()->json(['status'=>true, 'orderId' => $id]);

    }


    public static function edit(Request $request)  {

        $request->validate([
            'orderId' => 'required|int',
            'phone' => 'required|int',
            'fio' => 'required|string',
            'amount' => 'required|int',
            'address' => 'required|string',
        ]);

        $date = Carbon::now();

        DB::table('order')->where('id', $request->orderId)->update([
            'phone' => $request->phone,
            'fio' => $request->fio,
            'amount' => $request->amount,
            'address' => $request->address,
            'date' => $date,
        ]);
        
        return response()->json(['status'=>true, 'orderId' => $request->orderId]);

    }

    public static function orderId(Request $request)  {

        $request->validate([
            'orderId' => 'required|int',
        ]);

        $order = DB::table('order')->where('id', $request->orderId)->first();
        
        return response()->json(['status'=>true, 'order' => $order]);

    }

    public static function orderId(Request $request)  {

        $request->validate([
            'phone' => 'required|int',
        ]);

        $orders = DB::table('order')->where('phone', $request->phone)->get();
        
        return response()->json(['status'=>true, 'orders' => $orders]);

    }


}

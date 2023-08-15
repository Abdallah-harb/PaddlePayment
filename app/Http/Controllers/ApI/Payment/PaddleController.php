<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Http\Helper\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;

class PaddleController extends Controller
{

    public function pay(Request $request)
    {   //api
        $paylink = auth('api')->user()->charge(12.99, 'Action Figure');
        return ResponseHelper::sendResponseSuccess($paylink);
        /* wep */
       /* return view('pay', [
            //'payLink' => User::first()->charge(12.99, 'Action Figure')

        ]);*/
    }


}

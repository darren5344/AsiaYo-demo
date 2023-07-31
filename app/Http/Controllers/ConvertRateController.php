<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertRateRequest;
class ConvertRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConvertRateRequest $request)
    {
        $source = $request->get('source');
        $target = $request->get('target');
        $amount = $request->get('amount');

        if ($source !== $target) {
            $exchangeRate = collect(json_decode(config('app.exchangeRate'), true))->get('currencies');
            $amount = $amount * $exchangeRate[$source][$target];
        }

        $amount = number_format($amount, 2);

        return response()->json([
            'msg' => 'success',
            'amount' => $amount
        ]);
    }
}

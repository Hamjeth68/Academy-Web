<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CurrencyRate;

class CurrencyRateController extends Controller
{
    public function index()
    {
        $currencyrate = CurrencyRate::all();
        return view('dashboard.currency', [
            'currencyrate' => $currencyrate,
        ]);
    }
}

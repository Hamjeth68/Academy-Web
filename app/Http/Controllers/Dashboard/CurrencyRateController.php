<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
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


    public function currencyEdit(Request $request, $id)
    {
        $request->validate([
            'exchange_rate' => 'required',
        ]);

        $currencyrate = CurrencyRate::find('id', $id)->first();

        $data = ([
            'exchange_rate' => $request->exchange_rate,
        ]);

        $currencyrate->update($data);

        return redirect()->to('/dashboard/currency');
    }
}

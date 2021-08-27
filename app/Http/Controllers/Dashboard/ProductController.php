<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;




class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        // dd($products);
        return view('dashboard.products', compact('products'));
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'p_title' => 'required|max:191|string',
            'p_name' => 'required|max:191|string',
            'p_description' => 'required|max:191|string',
            'p_amount' =>  'numeric',
        ]);

        $data = $request->all();
        $val = $this->create($data);
    }

    public function updateProduct(Request $request, $id)
    {
        $data = Product::find((int) $id);

        $data->p_title = $request->input('p_title');
        $data->p_name = $request->input('p_name');
        $data->p_description = $request->input('p_description');
        $data->p_amount = $request->input('p_amount');

        $data->update();
        return $data;
    }

    public function deletePrdoct(Product $data)
    {
        $data->delete();
        //
    }
}

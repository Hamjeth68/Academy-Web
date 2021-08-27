<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
  

    protected $rules = [
        'product.title' => 'required|max:191|string',
        'product.name' => 'required|max:191|string',
        'product.description' => 'required|max:191|string',
        'product.amount' =>  'numeric',
    ];
    public function index()
    {
        
        $products = Product::all();
        dd($products);
        return view('dashboard.products', compact('products'));
       
    }

    public function createProduct()
    {
        Product::create([
            'p_title' => $this->product['title'],
            'p_name' => $this->product['name'],
            'p_description' => $this->product['description'],
            'p_amount' => $this->product['amount'],
        ]);
    }
}

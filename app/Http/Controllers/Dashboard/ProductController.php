<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('dashboard.products', [
            'products' => $products,
        ]);
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


    public function createPDF()
    {
        // retreive all records from db
        $data = Product::all();

        // share data to view
        view()->share('products', $data);
        $pdf = PDF::loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}

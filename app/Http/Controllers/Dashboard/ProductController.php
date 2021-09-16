<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use PDF;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('is_deleted', '0')->get();

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
            'image' => 'mimes:jpeg,png,jpg,gif,svg|required|image|max:2048',
        ]);


        if ($image = $request->file('image'))
        {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }


        Product::create([
            'p_title' => $request->p_title,
            'p_name' => $request->p_name,
            'p_description' => $request->p_description,
            'p_amount' => $request->p_amount,
            'image' => $input['image'],

        ]);
        return Redirect::to('/dashboard/products')->with('success', 'Product Created successfully');
    }

    public function updateProduct(Request $request, $id)
    {
        //        dd($request->all());
        $request->validate([
            'p_title' => 'required',
            'p_name' => 'required',
            'p_description' => 'required',
            'p_amount' =>  'numeric',
        ]);

        $products = Product::where('id', $id)->first();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $products['image'] = "$profileImage";

            $data = ([
                'p_title' => $request->p_title,
                'p_name' => $request->p_name,
                'p_description' => $request->p_description,
                'p_amount' => $request->p_amount,
                'image' => "$profileImage",
            ]);

        }else{
            $data = ([
                'p_title' => $request->p_title,
                'p_name' => $request->p_name,
                'p_description' => $request->p_description,
                'p_amount' => $request->p_amount,
                'image' => $products['image'],
            ]);
        }

        $products->update($data);

        return redirect()->to('/dashboard/products')->with('success', 'Product Updated successfully');
    }

    public function deleteProduct(Product $data, $id)
    {
        $data = Product::find($id);

        $is_deleted = ([
            'is_deleted' => '1',
        ]);

        if ($data->update($is_deleted)) {
            return redirect()->to('/dashboard/products')->with('success', 'Product Deleted successfully');
        } else {
            return redirect()->to('/dashboard/products')->with('error');
        }
    }


    public function createPDF()
    {
        // retreive all records from db
        $data = Product::where('is_deleted', '0')->get();
        // share data to view
        view()->share('products', $data);
        $pdf = PDF::loadView('pdf_view', $data)->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true])->setPaper('A4', 'Landscape');

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}

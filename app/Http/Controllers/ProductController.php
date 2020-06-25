<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
    }

    public function form($form=null,$id=null)
    {
        $data = null;
        if ($form === "create") {
            return view('backend.product.form', compact(['data','form']));
        } else if ($form === "edit") {
            $data = Product::find($id);
            return view('backend.product.form', compact(['data','form']));
        }
    }

    public function FunctionName(Request $request)
    {
        # code...
    }
}

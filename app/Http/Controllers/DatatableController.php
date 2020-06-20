<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    public function products(DataTables $dataTables)
    {
        $products = Product::all();
        return $dataTables->of($products)
        ->addColumn('action', function($data) {
            $button = '
                <div class="btn-group" role="group">
                    <a href="'.url('user/form/edit/'.$data->id).'" class="btn btn-info edit-button"><i class="fa fa-edit"></i></a>
                    <button value="'.$data->id.'" data-content="'.url('user').'" class="btn btn-warning delete-button"><i class="fa fa-trash"></i></button>
            ';
            if ($data->status) {
                $button .= '<button id="disable" value="'.$data->id.'" data-content="'.url('user').'" class="btn btn-danger status-button"><i class="fa fa-ban"></i></button>';
            } else {
                $button .= '<button id="enable" value="'.$data->id.'" data-content="'.url('user').'" class="btn btn-success status-button"><i class="fa fa-check"></i></button>';
            }
            return $button.'</div>';

        })
        ->rawColumns(['action'])
        ->make(true);
    }
}

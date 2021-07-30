<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\AddProduct;

class SearchProductController extends Controller
{
    public function create()
    {
      // $a = uniqid();
         $c_data = Category::all();
        $data = AddProduct::all();
        $data = AddProduct::select('*')->join('categories', 'categories.id', '=', 'add_products.category_id')->get();
        return view('admin.search_product',compact('c_data','data'));
      // return $a;
    }
    
           
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

class PagesController extends Controller
{
    function index()
    {
            return view('home');
            

    }
    function create()
    {
            
            return view('create');

    }
    function eedit()
    {
            
            return view('edit');

    }

    public function insert(Request $request){
$products = new products();
$products->p_names= $request->name;
$products->p_code= $request->p_code;
$products->p_dese= $request->p_dese;
$products->p_quantity= $request->p_quantity;
$products->p_stoke_date= $request->p_stoke_date;
$products->p_rating= $request->p_rating;
$products->p_purchesed= $request->p_purchesed;

$products->save();
return "Data inserted";
}

public function list(){
       
        $products = products::all();
        return view('view')->with('products',$products);

    }
//r u there?

//eta ami ektu pore dekhbo
public function edit(Request $request){

        $id = $request->id;
        $product = products::where('id',$id)->first();
        return view('edit')->with('product', $product);

    }

    public function editSubmit(Request $request){

        $products = products::where('id',$request->id)->first();
        $products->p_names= $request->name;
        $products->p_code= $request->p_code;
        $products->p_dese= $request->p_dese;
        $products->p_quantity= $request->p_quantity;
        $products->p_stoke_date= $request->p_stoke_date;
        $products->p_rating= $request->p_rating;
        $products->p_purchesed= $request->p_purchesed;
        $products->save();
        return "Data edited";

    }
//API
     public function APIList(){
        return Product::all();
    }
    public function APIPost(Request $request){
        $product = new Product();
        $products->p_names= $request->name;
        $products->p_code= $request->p_code;
        $products->p_dese= $request->p_dese;
        $products->p_quantity= $request->p_quantity;
        $products->p_stoke_date= $request->p_stoke_date;
        $products->p_rating= $request->p_rating;
        $products->p_purchesed= $request->p_purchesed;
        $products->save();

        return $request;
    }

}
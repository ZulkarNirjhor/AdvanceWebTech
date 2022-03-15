<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function serivce()
    {
        return view('serivce');
    }

    public function product()
    {
        $products = array("Web Development", "Web Hosting", "ERP Solution", "CMS Service");
        return view('product')->with('products', $products);
    }

    public function contact()
    {
        return view('contact_us');
    }

    public function ourTeams()
    {
        return view('our_teams');
    }

    public function about()
    {
        return view('about');
    }

    
}
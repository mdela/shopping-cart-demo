<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::available()->get();
        return view('index', compact('products'));
    }

    /**
     * Destroy the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroySession()
    {
        Auth::logout();
        return redirect('/');
    }
}

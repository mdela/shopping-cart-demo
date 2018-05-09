<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShoppingCartController extends Controller
{

    function __construct(Request $request){

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShoppingCart $shoppingCart)
    {

        $params = $shoppingCart->getInfo();
        return view('shopping-cart', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addItem(Product $product)
    {
        $this->request->session()->push('cart', $product); 
        
        return back()->withStatus(__('app.shopping_cart.added_item'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(ShoppingCart $shoppingCart)
    {
        if (Auth::check()) {
           return redirect()->route('invoice.show');
        }
        $params = $shoppingCart->getInfo();
        
        return view('checkout', $params);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $this->request->session()->forget('cart');
       
        return back();
    }
}

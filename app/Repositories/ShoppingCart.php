<?php

namespace App\Repositories;

use Illuminate\Http\Request;
/**
* 
*/
class ShoppingCart
{
	public function getInfo(){
		
        $shipping_charge = 200;
        $cart = collect(session('cart'));
        $cartItems = $this->getCartItems($cart);
        $totalCartItems = count($cart);
        $subtotal = $cartItems->sum('total');
        
		return compact('cartItems','totalCartItems','subtotal','shipping_charge');
	}
	
	public function getCartItems($cart){
		
        $cartItems = [];
        $repeatedItems = $cart->groupBy('id');
        foreach ($repeatedItems as $key => $repeatedItem) {
            $row = $repeatedItem->first();
            $row->qty = $repeatedItem->count();
            $row->total = $repeatedItem->sum('price');
            $cartItems[] = $row;
        }
        return collect($cartItems);
		
	}

}
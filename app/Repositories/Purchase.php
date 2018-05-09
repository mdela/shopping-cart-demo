<?php

namespace App\Repositories;


use App\Models\User;
use App\Models\Address;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Http\Requests\StoreInvoice;
use Illuminate\Http\Request;
use App\Repositories\ShoppingCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
/**
* 
*/
class Purchase
{
    private $user;
    private $client;
    private $invoice;

    function __construct(ShoppingCart $shoppingCart){
        
        $this->shoppingInfo = $shoppingCart->getInfo();
        
    }

	public function save($request){
        $this->request = $request;
        DB::transaction(function (){
            $this->storeUser();
            $this->storeAddress();
            $this->storeClient();
            $this->storeInvoice();
            $this->storeInvoiceItems();
            Auth::login($this->user);
        });
	}


    public function new(){
        $user = Auth::user();
        $this->client = $user->client;
        DB::transaction(function (){
            $this->storeInvoice();
            $this->storeInvoiceItems();
        });
    }
	
	private function storeUser(){

        $this->user = new User($this->request->only('email'));
        $this->user->password = bcrypt('secret');
        return $this->user->save();
		
	}

    private function storeAddress(){
        
        $this->address = new Address($this->request->only(
            'street','number','floor','dept', 'postal_code', 'city', 'country'
        ));
        
        return $this->address->save();
        
    }

    private function storeClient(){
        
        $this->client = new Client($this->request->only(
            'first_name','last_name','dni','phone'
        ));
        $this->client->user_id = $this->user->id;
        $this->client->address_id = $this->address->id;
        
        return $this->client->save();
        
    }

    private function storeInvoice(){
        
        $this->invoice = new Invoice();
        $this->invoice->client_id = $this->client->id;
        $this->invoice->subtotal = $this->shoppingInfo['subtotal'];
        return $this->invoice->save();
        
    }

    private function storeInvoiceItems(){
        
        $cartItems = $this->shoppingInfo['cartItems'];
        foreach ($cartItems as $item) {
            $data = [
                'quantity' => $item->qty,
                'unit_price' => $item->price, 
                'invoice_id' => $this->invoice->id,
                'product_id' => $item->id
            ];
            $invoiceItem = new InvoiceItem($data);
            $response = $invoiceItem->save();
        }
        
        
        return $response;
    }

}
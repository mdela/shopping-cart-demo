<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Repositories\Purchase;
use App\Http\Requests\StoreInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoice $request, Purchase $purchase)
    {
        if ($request->session()->has('cart')) {
            $purchase->save($request);
            $request->session()->forget('cart');   
        }
        $user = Auth::user();
        $invoice = $user->client->invoices->last();
        return view('invoice', compact('invoice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Purchase $purchase)
    {
        if ($request->session()->has('cart')) {
            $purchase->new();
            $request->session()->forget('cart');    
        }
        
        $user = Auth::user();
        $invoice = $user->client->invoices->last();
        
        return view('invoice', compact('invoice'));
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}

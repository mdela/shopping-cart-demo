@extends('layouts.secondary')

@section('title','Invoice')

@section('icon', 'file-text-o')

@section('css')
<link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col order-md-2 mb-4">
  	<div class="row">
        <div class="col order-md-2 mb-4">
    		<div class="invoice-title">
    			<h2>@lang('app.invoice.title')</h2>
    			<h3 class="float-xl-right">@lang('app.invoice.order') # {{ $invoice->id }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col">
    				<address>
    					<strong>@lang('app.invoice.billed_to')</strong><br>
    					{{ $invoice->client->fullName }}<br>
    					{{ $invoice->client->address->street }}
    					{{ $invoice->client->address->number }}<br>
    					{{ $invoice->client->address->floor }}
    					{{ $invoice->client->address->dept }}<br>
    					({{ $invoice->client->address->postal_code }})
    					{{ $invoice->client->address->city }},
    					{{ $invoice->client->address->country }}<br>
    				</address>
    			</div>

    			<div class="col">
    				<address class="float-xl-right">
        			<strong>@lang('app.invoice.date')</strong><br>
    					{{ $invoice->created_at }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>@lang('app.invoice.summary')</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>@lang('app.invoice.item')</strong></td>
        							<td class="text-center"><strong>@lang('app.invoice.price')</strong></td>
        							<td class="text-center"><strong>@lang('app.invoice.qty')</strong></td>
        							<td class="text-right"><strong>@lang('app.invoice.totals')</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							@foreach($invoice->items as $item)
    								<tr>
	    								<td>
	    									<h6 class="my-0">
									          {{ $item->product->name }}
									        </h6>
									        <small class="text-muted">{{ $item->product->description }}</small>
	    								</td>
	    								<td class="text-center">${{ $item->price }}</td>
	    								<td class="text-center">{{  $item->quantity }}</td>
	    								<td class="text-right">${{ $item->total }}</td>
	    							</tr>
    							@endforeach
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>@lang('app.invoice.subtotal')</strong></td>
    								<td class="thick-line text-right">${{ $invoice->subtotal }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>@lang('app.invoice.shipping')</strong></td>
    								<td class="no-line text-right">${{ $invoice->shipping_charge }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>@lang('app.invoice.total')</strong></td>
    								<td class="no-line text-right">${{ $invoice->total }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
 </div>
  
@endsection
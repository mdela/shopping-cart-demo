@extends('layouts.main')

@section('title','Home')

@section('content')

  	@forelse($products as $key => $product)
 
    	@include('helpers.product-card', compact($product))
 
  	@empty
 
    	@include('helpers.no-records')
 
  	@endforelse
  
@endsection
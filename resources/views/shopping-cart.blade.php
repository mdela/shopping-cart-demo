@extends('layouts.secondary')

@section('title','Shopping Cart')

@section('icon', 'shopping-cart')

@section('content')

<div class="col-md-12 order-md-2 mb-4">
  @include('helpers.cart-items',$cartItems)
  <hr class="mb-4">
  @if($totalCartItems > 0)
    <a href="{{ url('shopping-cart/checkout') }}" 
      class="btn btn-success btn-lg btn-block fixed-bootom" type="submit">
      @lang('app.shopping_cart.checkout')
    </a>
  <a href="{{ route('shopping.cart.destroy') }}" 
    class="btn btn-dark btn-sm btn-block fixed-bootom" type="submit">
    @lang('app.shopping_cart.destroy')
  </a>
  @endif
</div>

@endsection
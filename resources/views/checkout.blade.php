@extends('layouts.secondary')

@section('title','Shopping Cart | Checkout')

@section('icon', 'truck')

@section('content')

  <div class="col-md-4 order-md-2 mb-4">
    @include('helpers.cart-items',$cartItems)
  </div>
  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">@lang('app.purchase.billing_address')</h4>
    @include('helpers.messages')
    <form class="needs-validation" novalidate action="{{ route('invoice.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">
            @lang('app.purchase.client.first_name')
          </label>
          <input type="text" class="form-control" id="firstName" name="first_name" value="{{ old('first_name') }}" required>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">
            @lang('app.purchase.client.last_name')
          </label>
          <input type="text" class="form-control" id="lastName" name="last_name" value="{{ old('last_name') }}" required>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="dni">@lang('app.purchase.client.dni')</label>
        <input type="dni" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" required maxlength="8">
        <div class="invalid-feedback">
          @lang('app.required')
        </div>
      </div>

      <div class="mb-3">
        <label for="phone">@lang('app.purchase.client.phone')</label>
        <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required maxlength="8">
        <div class="invalid-feedback">
          @lang('app.required')
        </div>
      </div>

      <div class="mb-3">
        <label for="email">@lang('app.purchase.client.email')</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
        <div class="invalid-feedback">
          @lang('app.invalid.email')
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="street">
            @lang('app.purchase.shipping_address.street')
          </label>
          <input type="text" class="form-control" name="street" value="{{ old('street') }}" required>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="number">
            @lang('app.purchase.shipping_address.number')
          </label>
          <input type="text" class="form-control" name="number" value="{{ old('number') }}" required>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="floor">
            @lang('app.purchase.shipping_address.floor')
          </label>
          <input type="text" class="form-control" name="floor" value="{{ old('floor') }}">
          <span class="text-muted"> 
            @lang('app.optional')
          </span>
        </div>
        <div class="col-md-3 mb-3">
          <label for="dept">
            @lang('app.purchase.shipping_address.dept')
            
          </label>
          <input type="text" class="form-control" name="dept" value="{{ old('dept') }}">
          <span class="text-muted"> 
              @lang('app.optional')
            </span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">@lang('app.purchase.shipping_address.country')</label>
          <select class="custom-select d-block w-100" id="country" required name="country" value="{{ old('country') }}">
            <option value="">@lang('app.select')</option>
            <option>United States</option>
          </select>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="city">@lang('app.purchase.shipping_address.city')</label>
          <select class="custom-select d-block w-100" id="city" name="city" required value="{{ old('city') }}">
            <option value="">@lang('app.select')</option>
            <option>California</option>
          </select>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">@lang('app.purchase.shipping_address.postal_code')</label>
          <input type="text" class="form-control" id="zip" name="postal_code" value="{{ old('postal_code') }}" required>
          <div class="invalid-feedback">
            @lang('app.required')
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <button class="btn btn-warning btn-lg btn-block" type="submit">
        @lang('app.purchase.invoice')
      </button>
    </form>
  </div>
  
@endsection
<h4 class="d-flex justify-content-between align-items-center mb-3">
  <span class="text-muted">@lang('app.shopping_cart.title')</span>
  <span class="badge badge-secondary badge-pill">{{ $totalCartItems }}<span>
</h4>
<ul class="list-group mb-3">
  @forelse($cartItems as $item)
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">
          ({{ $item->qty }}) {{ $item->name }}
        </h6>
        <small class="text-muted">{{ $item->description }}</small>
      </div>
      <span class="text-muted">${{  number_format($item->total, 2, ',','.') }}</span>
    </li>
    
  @empty

    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">@lang('app.shopping_cart.empty')</h6>
    </li>

  @endforelse
  
  @if(Route::currentRouteName() == 'shopping-cart.checkout')
  <li class="list-group-item d-flex justify-content-between bg-light">
    <div class="text-info">
      <h6 class="my-0">@lang('app.products.shipping_charge.title')</h6>
      <small>@lang('app.products.shipping_charge.description')</small>
    </div>
    <span class="text-info">${{ $shipping_charge }}</span>
  </li>
  @endif
  @if($totalCartItems > 0)
  <li class="list-group-item d-flex justify-content-between">
    <span>SubTotal (ARG)</span>
    <strong>{{ number_format($subtotal, 2, ',','.') }}</strong>
  </li>
  @endif
</ul>
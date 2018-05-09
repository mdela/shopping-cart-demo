<div class="col-md-4">
  <div class="card mb-4 box-shadow">
    <img class="card-img-top" src="http://lorempixel.com/348/225/technics/{{ $key }}" alt="Card image cap" width="348" height="225" class="img-fluid">
    <div class="card-body">
      <div class="card-title">
        <p class="h5">{{ $product->name }}</p>
        <p class="h6">{{ $product->model }}</p>
      </div>
      <small class="text-muted">
        @lang('app.products.brand', ['brand' => $product->brand])
      </small>
      <p class="card-text">
        <em>{{ $product->description }}</em>
      </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="badge badge-warning">
          @lang('app.products.categories.'.$product->category->name)
        </span>
        <span class="lead">${{ $product->formatedPrice }}</span>
      </div>
      <div class="card-footer float-xl-right">
        <a href="{{ route('shopping.cart.add.item', $product) }}" class="btn btn-success btn-sm">
          <i class="fa fa-shopping-cart"></i> @lang('app.shopping_cart.add')
        </a>
      </div>
    </div>
  </div>
</div>
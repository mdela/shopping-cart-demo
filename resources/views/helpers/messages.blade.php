@if (session('status'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <i class="fa fa-cart-plus fa-lg"></i> 
	  <strong>{{ session('status') }}</strong>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif
@if($errors->count()>0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  	<ul>
  		@foreach ($errors->all() as $message)
			<li><strong>{{ $message }}</strong></li>
		@endforeach
  	</ul>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

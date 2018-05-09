<div class="fixed-top">
  @if (Auth::check())
    <a href="{{ url('logout') }}" class="btn btn-light text-danger btn-lg btn-block" title="@lang('app.logout')">
      <small><i class="fa fa-sign-out"></i> {{ Auth::user()->email }}</small>
    </a>
  @else
    <a href="{{ url('/') }}" class="btn btn-light text-danger btn-lg btn-block">
      <small><i class="fa fa-home"></i> HOME</small>
    </a>
  @endIf
</div>
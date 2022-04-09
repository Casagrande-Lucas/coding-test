@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @can('read_product')
          <a class="link" href="#">Go to Page</a>
          @endcan
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

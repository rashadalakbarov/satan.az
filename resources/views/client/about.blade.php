@extends('client.layouts.mixed')

@section('content')
<div class="row">
    <div class="col-12 col-md-3">
        @include('client.layouts.navpills')
    </div>
    <div class="col-12 col-md-9">
        <h1 class="fs-2">Layihə haqqında</h1>
        <p class="mt-5">{{ $company['about'] }}</p>
    </div>
</div>
@endsection
@extends('client.layouts.mixed')

@section('content')
<div class="row">
    <div class="col-12 col-md-3">
        @include('client.layouts.navpills')
    </div>
    <div class="col-12 col-md-9">
        <h1 class="fs-2">Elan yerləşdirilmə qaydaları</h1>
        <ol class="rule mt-5">
            @foreach($all_lists as $item)
            <li>
                <span class="fw-bold">{{$item->title}}</span>

                @if($item->children->count())
                    <ol>
                        @foreach($item->children as $child)
                            <li>{{$child->title}}</li>
                        @endforeach
                    </ol>
                @endif
            </li>
            
            @endforeach
        </ol>
    </div>
</div>
@endsection
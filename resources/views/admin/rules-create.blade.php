@extends('layout.mixed')

@section('title', 'Qayda yarat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Yeni qayda formu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rules.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="default_title_rules">Qaydanın adı</label>
                        <input type="text" class="form-control @error('default_title_rules') is-invalid @enderror" id="default_title_rules" name="default_title_rules" value="{{old('default_title_rules')}}">
                        @error('default_title_rules') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_select" class="form-label">Kateqoriya seç</label>
                        <select class="form-select  @error('default_select') is-invalid @enderror" id="default_select" name="default_select" aria-label="Default select example">
                            <option value="">Ana Kateqoriya</option>
                            @foreach($rules as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_activate" class="form-label">Aktivlik</label>
                        <select class="form-select" id="default_activate" name="default_activate" aria-label="Default select example">
                            <option selected value="active">Aktivləşdir</option>
                            <option value="passive">Deaktiv et</option>
                        </select>
                        @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yarat</button>
                    <a href="{{ route('admin.rules.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
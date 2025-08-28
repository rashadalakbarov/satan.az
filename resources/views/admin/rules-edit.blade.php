@extends('layout.mixed')

@section('title', 'Qayda yenilə')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Qayda yeniləmə formu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rules.update', $rulecompany->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')

                    @if($rulecompany->parent_id  === null)
                    <div class="mb-3">
                        <label class="form-label" for="default_fullname">Qaydanın adı</label>
                        <input type="text" class="form-control @error('default_fullname') is-invalid @enderror" id="default_fullname" name="default_fullname" value="{{ old('title', $rulecompany->title) }}">
                        @error('default_fullname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    @else 
                    <div class="mb-3">
                        <label for="default_fullname" class="form-label">Qaydanın adı</label>
                        <textarea class="form-control" id="default_fullname" rows="7" name="default_fullname">{{ $rulecompany->title }}</textarea>
                        @error('default_fullname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    @endif

                    <div class="mb-3">
                         <label for="default_select" class="form-label">Ana Qayda (əgər varsa)</label>
                        <select name="default_select" id="default_select" class="form-select @error('default_select') is-invalid @enderror">
                            <option value="">— Ana Qayda olsun —</option>
                            @foreach($allCategories as $cat)
                                <option value="{{ $cat->id }}" @selected($rulecompany->parent_id == $cat->id)>
                                    {{ $cat->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_activate" class="form-label">Aktivlik</label>
                        <select class="form-select @error('default_activate') is-invalid @enderror" id="default_activate" name="default_activate" aria-label="Default select example">
                            <option value="active" @selected($rulecompany->activate == 'active')>Aktivləşdir</option>
                            <option value="passive" @selected($rulecompany->activate == 'passive')>Deaktiv et</option>
                        </select>
                        @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yenilə</button>
                    <a href="{{ route('admin.rules.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
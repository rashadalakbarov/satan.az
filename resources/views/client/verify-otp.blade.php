@extends('client.layouts.mixed')

@section('content')
<div class="w-100 d-flex align-items-center justify-content-center" style="height: 300px">
    <div class="card" style="width: 400px">    
        <div class="card-body">  
            <h3 class="mb-4 text-center">Nömrənin təsdiqlənməsi</h3> 
            
            <p class="text-center text-muted">{{ !empty(old('phone', $phone)) ? formatPhoneNumber(old('phone', $phone)) : '' }} nömrəsinə SMS-kod göndərildi</p>
            
            <form action="{{ route('verify-otp') }}" method="POST">
                @csrf
                <input type="hidden" name="phone" value="{{ old('phone', $phone) }}">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="otp" name="otp" value="{{ old('otp') }}" max="6">
                    <label for="phone">SMS kod</label>
                    @error('otp') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn w-100 btn-primary mt-1">Təsdiqlə</button>
            </form>
        </div>
    </div>
</div>
@endsection
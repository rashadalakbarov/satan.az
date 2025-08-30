@extends('client.layouts.mixed')

@section('content')
<section style="margin-top:31px">
    <div class="container">        
        <div class="row mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0" style="background-color: transparent; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="index" class="text-capitalize text-decoration-none"><i class="fas fa-home"></i> Ana səhifə</a></li>
                    <li class="breadcrumb-item active text-capitalize" aria-current="page">Yeni Elan</li>
                </ol>
            </nav>
        </div>
        <h1 class="text-center mb-5 fs-2">Yeni elan</h1>
        <div class="row">
            <div class="col-12 col-xl-8 order-2 order-xl-1">
                <form id="myForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="inputName">Adınız</label>
                        <input type="text" class="form-control name" id="inputName" name="inputName" placeholder="Adınızı daxil edin" minlength="2" value="{{ Auth::guard('phone')->user() ? Auth::guard('phone')->user()->name : '' }}" @if(Auth::guard('phone')->check()) readonly @endif>
                        <div class="text-danger" id="errInputName"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="inputEmail" placeholder="Email addresinizi daxil edin" value="{{ Auth::guard('phone')->user() ? Auth::guard('phone')->user()->email : '' }}" @if(Auth::guard('phone')->check()) readonly @endif>
                        <small id="emailHelp" class="form-text text-muted">E-poçtunuzu heç vaxt başqası ilə bölüşməyəcəyik.</small>
                        <div class="text-danger" id="errInputEmail"></div>
                    </div>

                    <div class="form-group mb-3">
                        @php
                            $rawPhone = Auth::guard('phone')->user() ? Auth::guard('phone')->user()->phone : '';
                            // Əvvəlcə +994-ü silirik
                            $formattedPhone = str_replace('+994', '0', $rawPhone);
                            // Boşluqları silirik
                            $formattedPhone = str_replace(' ', '', $formattedPhone);
                        @endphp
                        <label for="inputPhone">Telefon</label>
                        <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Nümunə: 0501234567"  maxlength="10" minlength="10" pattern="0[0-9]{9}" value="{{ $formattedPhone }}" @if(Auth::guard('phone')->check()) readonly @endif>
                        <div class="text-danger" id="errInputPhone"></div>
                    </div>

                    <div class="form-group mb-3" id="selectCityArea">
                        <label for="selectCity">Şəhər</label>
                        <select class="form-control" id="selectCity" name="selectCity">
                            <option value="">Siyahıdan seçin</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger" id="errSelectCity"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputElanTitle">Elanın adı</label>
                        <input type="text" class="form-control" id="inputElanTitle" name="inputElanTitle" minlength="3" placeholder="Elanın adını daxil edin">
                        <div class="text-danger" id="errInputElanTitle"></div>
                    </div>

                    <div class="form-group mb-3" id="priceInputArea">
                        <label for="inputPrice">Qiymət, AZN</label>
                        <input type="text" class="form-control" id="inputPrice" name="inputPrice"  minlength="1" placeholder="Qiyməti daxil edin">
						<div class="text-danger" id="errInputPrice"></div>
                    </div>

                     <div class="form-group mb-3">
                        <label for="textareaAdd">Məzmun</label>
                        <textarea name="textareaAdd" class="form-control" id="textareaAdd" rows="7" aria-describedby="helpDescription" minlength="15" placeholder="Satdığınız məhsulu vəya göstərdiyiniz xidməti ətraflı şəkildə burada qeyd edin"></textarea>
                        <div class="d-flex clearfix">
                            <small id="helpDescription" class="form-text text-muted w-100">
                                <span class="float-left">Mətnin minimal uzunluğu 15 karakter olmalıdır.</span>
                            </small>
                        </div>                        
                        <div class="text-danger" id="errTextareaAdd"></div>
                    </div>

                    <hr style="margin:30px 0">

                    <p class="mt-3">Siz elan yerləşdirərkən satan.az saytının <a href="{{route('rules')}}">qaydalarıyla</a> razı olduğunuzu təsdiqləmiş olursunuz.</p>
                    <button type="submit" class="btn btn-primary text-capitalize custom-button">Elanı yarat</button>
                </form>
            </div>
            <div class="d-none d-xl-block col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 order-1 order-xl-2 mb-3">
                <div class="card add-rules">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase position-relative mb-3 rulers">Qısa QAYDALAR</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Qaydalara riayət edin</h6>
                        <ul>
                            @foreach($all_lists as $item)
                                <li>{{$item->title}}</li>           
                            @endforeach
                        </ul>
                        <a href="{{route('rules')}}" class="card-link">Saytın tam qaydaları</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    $('#myForm').submit(function(e) {
        e.preventDefault(); // Formun normal submit olmasını engelle

         // Tüm hata mesajlarını temizle
        $('.text-danger').text('');

        $.ajax({
            url: '{{ route("new.store") }}', // Controller route
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message); // Başarılı mesaj
                $('#myForm')[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    if (errors.inputName) $('#errInputName').text(errors.inputName[0]);
                    if (errors.inputPhone) $('#errInputPhone').text(errors.inputPhone[0]);
                    if (errors.inputEmail) $('#errInputEmail').text(errors.inputEmail[0]);
                    if (errors.selectCity) $('#errSelectCity').text(errors.selectCity[0]);
                    if (errors.inputElanTitle) $('#errInputElanTitle').text(errors.inputElanTitle[0]);
                    if (errors.inputPrice) $('#errInputPrice').text(errors.inputPrice[0]);
                    if (errors.textareaAdd) $('#errTextareaAdd').text(errors.textareaAdd[0]);
                } else {
                    alert('Xəta baş verdi, yenidən cəhd edin.');
                }
            }
        });
    });
});
</script>
@endsection
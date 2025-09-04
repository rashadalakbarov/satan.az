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
                <form id="myForm" enctype="multipart/form-data">
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

                    <div class="form-group mb-3">
                        <label for="categorySelect">Kateqoriyalar</label>
                        <select class="form-control" name="category_id" id="categorySelect">
                            <option value="">Kateqoriya axtar ...</option>
                            @foreach($mainCategories as $main)
                                <optgroup label="{{ $main->title }}">
                                    @foreach($main->children as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <div class="text-danger" id="errSelectCategory"></div>
                    </div>

                    <!-- Dinamik Option Alanları -->
                    <div id="dynamicOptions" class="row gy-3 mb-3"></div>

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

                    <div class="custom-file">
                        <input type="file" class="custom-file-input mb-2" multiple name="files[]" id="files" accept="image/jpeg, image/png, image/gif," aria-describedby="helpImage" title="Şəkillər toplu halda seçilməlidir. Sonradan əlavə olunan şəkil əvvəldən toplu halda yüklənmiş şəkilləri silir.">
                        <label class="custom-file-label" for="files">Şəkil toplu halda seçin</label>
                        <small id="helpImage" class="form-text text-muted">Bir şəkilin maksimal həcmi 10 MB olmalıdır</small>
                        <div class="text-danger w-100" id="errMultiImg"></div>
                    </div>

                    <div id="previewArea" class="d-flex flex-wrap gap-2"></div>

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
    const uploader = handleMultiImageUpload(
        "#files",
        "#previewArea",
        "#errMultiImg"
    );

    // handle Multi Upload
    function handleMultiImageUpload(
        fileInputSelector,
        previewContainerSelector,
        errorSelector
    ) {
        const fileInput = $(fileInputSelector);
        const previewContainer = $(previewContainerSelector);
        const errMsg = $(errorSelector);

        // { file, sig } siyahısı və duplikatları izləmək üçün Set
        let items = [];
        const sigSet = new Set();

        // Fayl üçün unikal imza
        const makeSig = (f) => `${f.name}__${f.size}__${f.lastModified || 0}`;

        // Yalnız şəkilmi? (mime + uzantı fallback)
        const isImage = (f) => {
            const okType =
                f.type === "image/png" ||
                f.type === "image/jpeg" || // jpg/jpeg
                f.type === "image/gif" ||
                f.type === "image/jpg";
            const okExt = /\.(png|jpe?g|gif)$/i.test(f.name);
            return okType || okExt;
        };

        // Status mesajı
        const setError = (msg) => errMsg.text(msg || " ");

        // Limit/min yoxlaması
        const refreshStatus = () => {
            if (items.length < 3) setError("Ən azı 3 şəkil seçməlisiniz.");
            else if (items.length > 40)
                setError("Ən çox 40 şəkil seçə bilərsiniz.");
            else setError(" ");
        };

        // Tək preview (pip) yarat
        const createPreview = (file, sig) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const $pip = $(`
        <div class="pip d-inline-block m-1 position-relative" data-sig="${sig}">
          <img src="${e.target.result}" class="img-thumbnail" style="width:100px;height:100px;object-fit:cover;">
          <button type="button" class="remove btn btn-sm btn-danger position-absolute" style="top:0;right:0;">&times;</button>
        </div>
      `);

                // Sil düyməsi
                $pip.find(".remove").on("click", function () {
                    // imza üzrə sil
                    items = items.filter((it) => it.sig !== sig);
                    sigSet.delete(sig);
                    $pip.remove();
                    refreshStatus();
                });

                previewContainer.append($pip);
            };
            reader.readAsDataURL(file);
        };

        // Dəyişiklikdə yeni faylları əlavə et
        fileInput.on("change", function () {
            const selected = Array.from(fileInput.get(0).files);

            // Cancel edilibsə
            if (selected.length === 0) return;

            for (const file of selected) {
                // Şəkil deyil → xəbərdarlıq et, keç
                if (!isImage(file)) {
                    setError("Bu fayl şəkil deyil: " + file.name);
                    continue;
                }

                const sig = makeSig(file);

                // Duplikat yoxlaması
                if (sigSet.has(sig)) {
                    setError("Bu şəkil artıq əlavə olunub: " + file.name);
                    continue;
                }

                // Max limit
                if (items.length >= 40) {
                    setError("Ən çox 40 şəkil seçə bilərsiniz.");
                    break;
                }

                // Qəbul et və pip yarat
                items.push({ file, sig });
                sigSet.add(sig);
                createPreview(file, sig);
            }

            refreshStatus();

            // Eyni faylı təkrar seçə bilmək üçün reset
            fileInput.val("");
        });

        // Kənardan faylları götürmək üçün
        return {
            getFiles: () => items.map((it) => it.file),
            clearAll: () => {
                items = [];
                sigSet.clear();
                previewContainer.empty();
                refreshStatus();
            },
        };
    }

    $('#categorySelect').on('change', function () {
        $("#error_category_id").remove();

        let categoryId = $(this).val();

        $('#dynamicOptions').html('<div class="text-muted">Yüklənir...</div>');

        if (categoryId) {
            $.ajax({
                url: `/new/get-options/${categoryId}`,
                type: 'GET',
                success: function (options) {
                    let html = '';

                    options.forEach(option => {
                        if (option.type === 'check' && option.activate === 'active') {
                            html += `
                                <div class="col-md-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="option_${option.id}" value="1" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                        <label class="form-check-label" for="option${option.id}">
                                            ${option.title}
                                        </label>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            `;
                        } else if (option.type === 'select' && option.activate === 'active') {
                            html += `
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <select class="form-control option-select" name="option_${option.id}" id="option${option.id}" data-option-id="${option.id}" ${option.required === '1' ? 'required' : ''}>
                                            <option value="">Yüklənir...</option>
                                        </select>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            `;
                        } else {
                            html += `
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <input type="text" class="form-control" name="option_${option.id}" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            `;
                        }
                    });

                    $('#dynamicOptions').html(html);

                    // select alanlar yüklendikten sonra suboptionları getir
                    $('.option-select').each(function () {
                        let optionId = $(this).data('option-id');
                        let selectElement = $(this);

                        $.ajax({
                            url: `/new/get-option-values/${optionId}`,
                            type: 'GET',
                            success: function (values) {
                                let optionsHtml = `<option value="">Seçin</option>`;
                                values.forEach(val => {
                                    optionsHtml += `<option value="${val}">${val}</option>`;
                                });
                                selectElement.html(optionsHtml);
                            },
                            error: function () {
                                selectElement.html('<option value="">Xəta baş verdi</option>');
                            }
                        });
                    });

                },
                error: function () {
                    $('#dynamicOptions').html('<div class="text-danger">Optionlar gətirilərkən xəta baş verdi.</div>');
                }
            });
        } else {
            $('#dynamicOptions').html('');
        }
    });

    $('#myForm').submit(function(e) {
        e.preventDefault(); // Formun normal submit olmasını engelle

         // Tüm hata mesajlarını temizle
        $('.text-danger').text('');
        $('#errMultiImg').text('');

        let formData = new FormData();

        // digər inputları əlavə et (file deyilənlərdən başqa)
        $('#myForm').find("input, select, textarea").each(function() {
            if (this.type !== "file") {
                formData.append(this.name, $(this).val());
            }
        });

        // Şəkilləri əlavə et
        const files = uploader.getFiles();
        for (let i = 0; i < files.length; i++) {
            formData.append("files[]", files[i]);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '{{ route("new.store") }}', // Controller route
            method: 'POST',
            data: formData,
            processData: false, // FormData üçün lazım
            contentType: false, // FormData üçün lazım
            success: function(response) {
                alert(response.message); // Başarılı mesaj
                selectedFiles = [];
                $('#previewArea').empty();
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
                    if (errors.files) $('#errMultiImg').text(errors.files[0]);
                    if (errors['files.*']) $('#errMultiImg').text(errors['files.*'][0]);
                    if (errors.category_id) $('#errSelectCategory').text(errors.category_id[0]);
                    
                } else {
                    alert('Xəta baş verdi, yenidən cəhd edin.');
                }
            }
        });
    });
});
</script>
@endsection
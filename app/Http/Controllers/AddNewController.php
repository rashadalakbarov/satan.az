<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\City;
use App\Models\Elan;
use App\Models\Image;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\ElanOption;

use App\Models\RuleCompany;

use Illuminate\Support\Facades\Validator;

class AddNewController extends Controller
{
    public function index(){
        $mainCategories = Category::whereNull('parent_id')
        ->where('activate', 1)
        ->with('children')
        ->get();
        
        $all_lists = RuleCompany::whereNotNull('parent_id')
        ->where('activate', "active")
        ->limit(7)
        ->get();

        $cities = City::orderBy('name', 'ASC')->get();

        return view('client.new', compact('mainCategories', 'all_lists', 'cities'));
    }

    public function getOptions($category_id) {
        $options = Option::where('category_id', $category_id)->where('activate', 'active')->get();

        return response()->json($options);
    }

    public function getOptionValues($option_id) {
        $values = OptionValue::
            where('option_id', $option_id)
            ->where('activate', 'active')
            ->pluck('value');

        return response()->json($values);
    }

    public function store(Request $request) {
        /**
         * 1. Sabit kurallar
         */
        $rules = [
            'inputName'      => ['required','string','min:2','regex:/^[A-Za-zƏəÖöÜüİIıŞşÇçĞğ\s]+$/u'],
            'inputEmail'     => 'required|email',
            'inputPhone'     => ['required','regex:/^0[0-9]{9}$/'],
            'selectCity'     => 'required|exists:cities,id',
            'inputElanTitle' => ['required','string','min:3','regex:/^[A-Za-zƏəÖöÜüİIıŞşÇçĞğ0-9\s-]+$/u'],
            'inputPrice'     => ['required','regex:/^[0-9]+$/'],
            'textareaAdd'    => ['required','string','min:15'],
            'files'          => ['required','array','min:3','max:40'],
            'files.*'        => ['file','image','mimes:jpg,jpeg,png,gif','max:10240'],
            'category_id'    => 'required|exists:categories,id',
        ];

        /**
         * 2. Dinamik alanlar
         *  option_1, option_2, option_99 gibi her input için kural ekliyoruz
         *  eğer JS tarafında "required" attribute varsa ona göre 'required' ekliyoruz
         */
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^option_\d+$/', $key)) {
                // Blade tarafında required attr var mı yok mu kontrolü
                // attr server tarafında da gelmediyse istersen DB'den de alabilirsin
                // Şimdilik basit: dolu ise nullable|string, boş ise required|string
                $rules[$key] = $request->has($key) && $request->$key !== ''
                    ? 'nullable|string|max:255'
                    : 'required|string|max:255';
            }
        }

        /**
         * 3. Validator
         */
        $messages = [
            'inputName.required' => 'Ad daxil edilməlidir.',
            'inputName.min'      => 'Ad ən azı 2 simvol olmalıdır.',
            'inputName.regex'    => 'Ad yalnız hərf və boşluqlardan ibarət olmalıdır.',

            'inputEmail.required' => 'Email daxil edin.',
            'inputEmail.email'    => 'Email düzgün formatda olmalıdır.',

            'inputPhone.required' => 'Telefon nömrəsi daxil edin.',
            'inputPhone.regex'    => 'Telefon 10 rəqəmli olmalı, 0 ilə başlamalıdır.',

            'selectCity.required' => 'Şəhər seçilməlidir.',
            'selectCity.exists'   => 'Seçilən şəhər mövcud deyil.',

            'inputElanTitle.required' => 'Elan adı daxil edilməlidir.',
            'inputElanTitle.min'      => 'Elan adı ən azı 3 simvol olmalıdır.',
            'inputElanTitle.regex'    => "Elan adı yalnız hərf, rəqəm, boşluq və '-' işarəsi ola bilər.",

            'inputPrice.required' => 'Qiymət boş ola bilməz.',
            'inputPrice.regex'    => 'Qiymət yalnız rəqəmlərdən ibarət olmalıdır.',

            'textareaAdd.required' => 'Məzmun daxil edilməlidir.',
            'textareaAdd.min'      => 'Məzmun ən azı 15 simvol olmalıdır.',

            'files.required'   => 'Ən azı 3 şəkil yükləməlisiniz.',
            'files.array'      => 'Fayllar düzgün formatda olmalıdır.',
            'files.min'        => 'Ən azı 3 şəkil yükləməlisiniz.',
            'files.max'        => 'Ən çox 40 şəkil yükləyə bilərsiniz.',
            'files.*.image'    => 'Seçilmiş fayl şəkil olmalıdır.',
            'files.*.mimes'    => 'Yalnız jpg, jpeg, png və gif faylları qəbul olunur.',
            'files.*.max'      => 'Hər fayl maksimum 10MB ola bilər.',

            'category_id.required' => 'Kateqoriya seçilməlidir.',
            'category_id.exists'   => 'Seçilən kateqoriya mövcud deyil.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Telefon formatlama: 0555555555 → +99455 555 55 55
        $phone = preg_replace('/\D/', '', $request->inputPhone); // sadece rakamlar
        if (substr($phone, 0, 1) === '0') {
            $phone = substr($phone, 1); // baştaki 0’ı çıkar
        }
        $formattedPhone = '+994' . substr($phone, 0, 2) . ' ' . substr($phone, 2, 3) . ' ' . substr($phone, 5, 2) . ' ' . substr($phone, 7, 2);

        //  Email kontrolü
        $user_existing = User::where('email', $request->inputEmail)->first();

        if ($user_existing) {
            $user_id = $user_existing->id;
        } else {
            $user = User::create([
                'name' => $request->inputName,
                'email' => $request->inputEmail,
                'phone' => $formattedPhone,
            ]);

            $user_id = $user->id;
        }

        // Elan create
        $elan = new Elan();
        $elan->user_id = $user_id;
        $elan->title = $request->inputElanTitle;
        $elan->price =  $request->inputPrice;
        $elan->city_id = $request->selectCity;
        $elan->description = $request->textareaAdd;
        $elan->save();

        // Seçilen kategoriye ait option'ları al
        $options = Option::where('category_id', $request->category_id)->get();

        // Her option için kayıt oluştur
        foreach ($options as $option) {
            $fieldKey = 'option_' . $option->id;

            if ($request->has($fieldKey)) {
                ElanOption::create([
                    'elan_id' => $elan->id, // burayi daha sonra dinamik et
                    'category_id' => $request->category_id,
                    'option_id' => $option->id,
                    'value' => $request->input($fieldKey),
                ]);
            }
        }

        // image upload
        $uploadedFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('advert', 'public'); // storage/app/public/advert
                $filename = basename($path);

                // DB-yə yalnız fayl adı əlavə et
                $image = new Image();
                $image->path = $filename;
                $image->elan_id = $elan->id;
                $image->save();

                $uploadedFiles[] = $filename;
            }
        }

        // Başarılı durum: veri kaydet veya başka işlem
        return response()->json([
            'message' => 'Form uğurla göndərildi!',
            'user_id' => $user_id
        ]);
    }
}

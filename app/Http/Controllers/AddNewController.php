<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
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

        return view('client.new', compact('mainCategories', 'all_lists'));
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
        $validator = Validator::make($request->all(), [
            'inputName' => [
                'required',
                'string',
                'min:2',
                'regex:/^[A-Za-zƏəÖöÜüİIıŞşÇçĞğ\s]+$/u' // AZ/EN harfleri ve boşluk
            ],
            'inputEmail' => 'required|email',
            'inputPhone' => [
                'required',
                'regex:/^0[0-9]{9}$/'
            ],
        ], [
            'inputName.required' => 'Ad daxil edilməlidir.',
            'inputName.min' => 'Ad ən azı 2 simvol olmalıdır.',
            'inputName.regex' => 'Ad yalnız hərf və boşluqlardan ibarət olmalıdır.',

            'inputEmail.required' => 'Email daxil edin.',
            'inputEmail.email' => 'Email düzgün formatda olmalıdır.',
            
            'inputPhone.required' => 'Telefon nömrəsi daxil edin.',
            'inputPhone.regex' => 'Telefon 10 rəqəmli olmalı, 0 ilə başlamalı və yalnız rəqəmlərdən ibarət olmalıdır.',
        ]);

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

        // Başarılı durum: veri kaydet veya başka işlem
        return response()->json([
            'message' => 'Form uğurla göndərildi!',
            'user_id' => $user_id
        ]);
    }
}

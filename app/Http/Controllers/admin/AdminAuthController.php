<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;

class AdminAuthController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function authenticate(LoginRequest $request){

        // validation artıq avtomatik oldu, $request->validated() ilə təmiz data var
        $credentials = $request->validated();

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->status != '2') {
                Auth::guard('admin')->logout();
                return redirect()
                    ->route('admin.index')
                    ->with('error', 'Bu səhifəyə daxil olmaq üçün icazəniz yoxdur');
            }

            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Xoş gəldiniz!');
        }

        return redirect()
            ->route('admin.index')
            ->with('error', 'E-poçt və ya şifrə səhvdir');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}

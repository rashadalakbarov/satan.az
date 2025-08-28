<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RuleCompany;

class HomeController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function about(){
        return view('client.about');
    }

    public function rules(){
        $all_lists = RuleCompany::with('children')->whereNull('parent_id')->where('activate', "active")->get();

        return view('client.rules', compact('all_lists'));
    }
}

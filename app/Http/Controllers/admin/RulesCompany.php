<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RuleCompany;

class RulesCompany extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = RuleCompany::with('children')->whereNull('parent_id')->orderBy('title')->paginate(10);
        return view('rules-index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rules = RuleCompany::with('children')->whereNull('parent_id')->get(); // sadece ana Qaydaler
        return view('rules-create', compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'default_title_rules' => trim($request->input('default_title_rules'))
        ]);

        $request->validate([
            'default_title_rules' => 'required|string|max:255',
            'default_select' => 'nullable',
            'default_activate' => 'required',
        ], [
            'default_title_rules.required' => 'Qaydanın adı boş buraxılmamalıdır.',
            'default_title_rules.string' => 'Qaydanın adı mətn şəklində olmalıdır.',
            'default_title_rules.max' => 'Qaydanın adı ən çox :max simvol ola bilər.',

            'default_activate.required' => 'Qaydanın aktivliyi boş buraxılmamalıdır.',

            'default_select.exists' => 'Kateqoriya mövcuddur',
        ]);

        RuleCompany::create([
            'title' => $request->default_title_rules,
            'parent_id' => $request->default_select,
            'activate' => $request->default_activate,
        ]);
        return redirect()->route('admin.rules.index')->with('success', 'Qayda əlavə edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rulecompany = RuleCompany::findOrFail($id);
        $allCategories = RuleCompany::where('id', '!=', $id)->get(); // kendisi hariç diğer Qaydaler (ana Qayda seçimi için)

        return view('rules-edit', compact('rulecompany', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'default_fullname' => trim($request->input('default_fullname'))
        ]);

        $request->validate([
            'default_fullname' => 'required|string',
            'default_select' => 'nullable',
            'default_activate' => 'required',
        ], [
            'default_fullname.required' => 'Qaydanın adı boş buraxılmamalıdır.',
            'default_fullname.string' => 'Qaydanın adı mətn şəklində olmalıdır.',

            'default_activate.required' => 'Qaydanın aktivliyi boş buraxılmamalıdır.',

            'default_select.exists' => 'Kateqoriya mövcuddur',
        ]);

        $RuleCompany = RuleCompany::findOrFail($id);

        $RuleCompany->title = $request->default_fullname;
        $RuleCompany->parent_id = $request->default_select;
        $RuleCompany->activate = $request->default_activate;
        $RuleCompany->save();

        return redirect()->route('admin.rules.index')->with('success', 'Qayda yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $RuleCompany = RuleCompany::findOrFail($id);

        $RuleCompany->delete();
        return redirect()->route('admin.rules.index')->with('success', 'Qayda silindi.');
    }
}

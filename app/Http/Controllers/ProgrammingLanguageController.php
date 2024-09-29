<?php

namespace App\Http\Controllers;

use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    public function index()
    {
        $programmingLanguages = ProgrammingLanguage::all();
        return view('ProgrammingLanguage.index', compact('programmingLanguages'));
    }


    public function create()
    {
        return view('ProgrammingLanguage.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProgrammingLanguage::create($request->all());

        return redirect()->route('ProgrammingLanguage.index')
                         ->with('success', 'Programming language created successfully!');
    }

    public function show($id)
    {
        $programmingLanguage = ProgrammingLanguage::findOrFail($id);
        return view('ProgrammingLanguage.show', compact('programmingLanguage')); 
    }

    public function edit($id)
    {
        $programmingLanguage = ProgrammingLanguage::findOrFail($id);
        return view('ProgrammingLanguage.edit', compact('programmingLanguage')); 
    }

    public function update(Request $request, $id)
    {
        $programmingLanguage = ProgrammingLanguage::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
        ]);

        $programmingLanguage->update($request->all());

        return redirect()->route('ProgrammingLanguage.index')->with('success', 'Programming language updated successfully!');
    }

    public function destroy($id)
    {
        $programmingLanguage = ProgrammingLanguage::findOrFail($id);
        $programmingLanguage->delete();

        return redirect()->route('ProgrammingLanguage.index')->with('success', 'Programming language deleted successfully!');
    }
}

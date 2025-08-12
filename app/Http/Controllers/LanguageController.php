<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Language::paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:10|unique:languages,code',
            'name' => 'required|string|max:100',
        ]);

        $language = Language::create($data);

        return response()->json($language, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return $language;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $data = $request->validate([
            'code' => 'sometimes|required|string|max:10|unique:languages,code,' . $language->id,
            'name' => 'sometimes|required|string|max:100',
        ]);

        $language->update($data);

        return response()->json($language);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return response()->json(null, 204);
    }
}

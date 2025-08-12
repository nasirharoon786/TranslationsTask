<?php

namespace App\Http\Controllers;

use App\Models\TranslationTag;
use Illuminate\Http\Request;

class TranslationTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TranslationTag::paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $translationTag = TranslationTag::create($data);

        return response()->json($translationTag, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TranslationTag $translationTag)
    {
        return $translationTag;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TranslationTag $translationTag)
    {
        $data = $request->validate([
            'code' => 'sometimes|required|string|max:10|unique:TranslationTags,code,' . $translationTag->id,
            'name' => 'sometimes|required|string|max:100',
        ]);

        $translationTag->update($data);

        return response()->json($translationTag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TranslationTag $translationTag)
    {
        $translationTag->delete();

        return response()->json(null, 204);
    }
}

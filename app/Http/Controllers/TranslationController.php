<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Translation::with(['language', 'tag'])->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'key_name' => 'required|string|max:255',
            'language_id' => 'required|exists:languages,id',
            'tag_id' => 'required|exists:translation_tags,id',
            'content' => 'required|string',
        ]);

        $translation = Translation::create($data);

        return response()->json($translation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Translation $translation)
    {
        return $translation->load(['language', 'tag']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Translation $translation)
    {
        $data = $request->validate([
            'key_name' => 'sometimes|required|string|max:255',
            'language_id' => 'sometimes|required|exists:languages,id',
            'tag_id' => 'sometimes|required|exists:translation_tags,id',
            'content' => 'sometimes|required|string',
        ]);

        $translation->update($data);

        return response()->json($translation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Translation $translation)
    {
        $translation->delete();

        return response()->json(null, 204);
    }

    /**
     * Search translations based on various criteria.
     */
    public function search(Request $request)
    {
        $query = Translation::query();

        if ($request->filled('key_name')) {
            $query->where('key_name', 'like', '%' . $request->key_name . '%');
        }
        if ($request->filled('content')) {
            $query->where('content', 'like', '%' . $request->content . '%');
        }
        if ($request->filled('tag_id')) {
            $query->where('tag_id', $request->tag_id);
        }
        if ($request->filled('language_id')) {
            $query->where('language_id', $request->language_id);
        }

        $results = $query->with(['language', 'tag'])->paginate(50);

        return response()->json($results);
    }

    /**
     * Export translations to JSON format.
     */
    public function exportJson(Request $request)
    {
        $export = [];

        DB::table('translations')
            ->join('languages', 'translations.language_id', '=', 'languages.id')
            ->select(
                'translations.key_name',
                'translations.content',
                'languages.code as lang_code'
            )
            ->orderBy('translations.id')
            ->chunk(40000, function ($rows) use (&$export) {
                foreach ($rows as $row) {
                    $export[] = $row;
                }
            });

        return response()->json($export);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateController extends Controller
{
    public function index()
    {
        $tr = new GoogleTranslate();
        $languages = $tr->languages('tr');
        return view('translate', compact('languages'));
    }

    public function translate(Request $request)
    {
        $tr = new GoogleTranslate();
        $tr->setSource($request->source_language);
        $tr->setSource();
        $tr->setTarget($request->target_language);
        $translation = $tr->translate($request->text);
        return response()->json($translation);
    }

    public function detect(Request $request)
    {
        $tr = new GoogleTranslate('tr');
        $tr->translate($request->text);
        $detection = $tr->getLastDetectedSource();
        $detected_language_name = $tr->languages('tr')[$detection];
        return response()->json([
            'language' => $detection,
            'name' => $detected_language_name,
        ]);
    }
}

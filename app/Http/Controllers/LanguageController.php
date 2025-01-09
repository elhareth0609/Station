<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller {

    public function index() {
        $languages = [];
        foreach (config('language') as $locale => $language) {
            $languages []= $locale;
        }
          // $languages = ['en', 'ar', 'fr']; // Define your supported languages
        $words = [];

        foreach ($languages as $lang) {
            // Get the path of the JSON file for each language
            $jsonPath = resource_path("lang/{$lang}.json");

            // Check if the file exists
            if (File::exists($jsonPath)) {
                // Read and decode the JSON file
                $translations = json_decode(File::get($jsonPath), true);

                // Iterate over each translation and organize them by key
                foreach ($translations as $key => $translation) {
                    $words[$key][$lang] = $translation;
                }
            }
        }

        // Pass the collected translations to the view
        return view('content.languages.index')
        ->with('words',$words)
        ->with('languages',$languages);
    }

    public function store(Request $request){
        // $data = $request->input('translations');

        // foreach ($data as $translation) {
        //     $language = $translation['language'];
        //     $word = $translation['word'];

        //     // Store the translation in the specified language folder
        //     $filePath = resource_path("lang/{$language}.php");
        //     $translations = [];

        //     // Check if the file exists and load the existing translations
        //     if (File::exists($filePath)) {
        //         $translations = include $filePath;
        //     }

        //     // Add or update the translation
        //     $translations['word'] = $word;

        //     // Save the updated translations
        //     File::put($filePath, "<?php\n\nreturn " . var_export($translations, true) . ";\n");
        // }

        // return redirect()->back()->with('success', __('Translations saved successfully!'));
    }

    public function change(Request $request, $locale) {
        $user = User::find(Auth::user()->id);
        $user->lang = $locale;
        $user->save();

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}

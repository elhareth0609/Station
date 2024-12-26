<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller {
    public function change(Request $request, $locale) {
        $user = User::find(Auth::user()->id);
        $user->lang = $locale;
        $user->save();

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\User;
use Google\Service\BeyondCorp\Resource\V;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller {
    public function index() {
        return view('content.dashboard.settings.index');
    }

    public function store() {
        return view('content.dashboard.settings.store');
    }

    public function website() {
        return view('content.dashboard.settings.website');
    }

    public function account() {
        return view('content.dashboard.settings.account');
    }

    public function privacy_and_policy() {
        $content = Details::where('type','privacy-and-policy')->first();
        return view('content.home.pages.privacy-and-policy')
        ->with('content',$content->content);
    }

    public function terms_of_use() {
        $content = Details::where('type','terms-of-use')->first();
        return view('content.home.pages.terms-of-use')
        ->with('content',$content->content);
    }

    public function about_us() {
        $content = Details::where('type','about-us')->first();
        return view('content.home.pages.about-us')
        ->with('content',$content->content);
    }

    public function delivery() {
        $content = Details::where('type','delivery')->first();
        return view('content.home.pages.delivery')
        ->with('content',$content->content);
    }

    public function get_account() {
        return view('content.settings.account');
    }


    public function update_account(Request $request) {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $user = User::find(Auth::user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            return response()->json([
                'icon' => 'success',
                'state' => __("Success"),
                'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function upload_image(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg', // Validate each file in the array
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/photos/users/'), $imageName);

            $user = User::find(Auth::user()->id);
            $user->photo = $imageName;
            $user->save();

            return response()->json([
                'icon' => 'success',
                'state' => __("Success"),
                'message' => __("Created Successfully.")
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function get_website() {
        return view('content.settings.website');
    }

    public function get_application() {
        return view('content.settings.application');
    }

    public function secure_payment() {
        $content = Details::where('type','secure-payment')->first();
        return view('content.home.pages.secure-payment')
        ->with('content',$content->content);
    }

    public function get_privacy_and_policy() {
        $content = Details::where('type','privacy-and-policy')->first();
        return view('content.dashboard.settings.privacy-and-policy')
        ->with('content',$content->content);
    }

    public function get_terms_of_use() {
        $content = Details::where('type','terms-of-use')->first();
        return view('content.dashboard.settings.terms-of-use')
        ->with('content',$content->content);
    }

    public function get_about_us() {
        $content = Details::where('type','about-us')->first();
        return view('content.dashboard.settings.about-us')
        ->with('content',$content->content);
    }

    public function get_delivery() {
        $content = Details::where('type','delivery')->first();
        return view('content.dashboard.settings.delivery')
        ->with('content',$content->content);
    }

    public function get_secure_payment() {
        $content = Details::where('type','secure-payment')->first();
        return view('content.dashboard.settings.secure-payment')
        ->with('content',$content->content);
    }

    public function update_privacy_and_policy(Request $request) {
        try {
            $content = Details::where('type','privacy-and-policy')->first();
            $content->content = $request->content;
            $content->save();
            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }

    public function update_terms_of_use(Request $request) {
        try {
            $content = Details::where('type','terms-of-use')->first();
            $content->content = $request->content;
            $content->save();
            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }

    public function update_about_us(Request $request) {
        try {
            $content = Details::where('type','about-us')->first();
            $content->content = $request->content;
            $content->save();
            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }

    public function update_delivery(Request $request) {
        try {
            $content = Details::where('type','delivery')->first();
            $content->content = $request->content;
            $content->save();
            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }

    public function update_secure_payment(Request $request) {
        try {
            $content = Details::where('type','secure-payment')->first();
            $content->content = $request->content;
            $content->save();
            return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }

}

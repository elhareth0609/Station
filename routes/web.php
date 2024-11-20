<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DataTabelController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;






    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


    Route::get('users', [DataTabelController::class, 'users'])->name('users');
    Route::get('datatabels', [DataTabelController::class, 'datatabels'])->name('datatabels');
    Route::get('google-sheet', [DataTabelController::class, 'google_sheet'])->name('google-sheet');
    
    Route::get('logs', [DataTabelController::class, 'logs'])->name('logs');

    Route::get('map', [MapController::class, 'index'])->name('map');
    Route::get('chat', [ChatController::class, 'index'])->name('chat');
    Route::get('email', [EmailController::class, 'index'])->name('email');
    Route::get('fullcalendar', [FullCalendarController::class, 'index'])->name('fullcalendar');

    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('auth/forgot-password', [AuthController::class, 'forgot_password'])->name('auth.forgot-password');

    Route::get('auth/login-basic', [PagesController::class, 'login'])->name('auth.basic.login');
    Route::get('auth/register-basic', [PagesController::class, 'register'])->name('auth.basic.register');
    Route::get('auth/forgot-password-basic', [PagesController::class, 'forgot_password'])->name('auth.basic.forgot-password');
    Route::get('404', [PagesController::class, 'P404'])->name('P404');
    Route::get('blank', [PagesController::class, 'blank'])->name('blank');


    // Coupons
    // Dashboard
    Route::get('/coupon/{id}', [CouponController::class, 'get'])->name('coupon');
    Route::post('/coupon/pdf/{id}', [CouponController::class, 'pdf'])->name('coupon.pdf');
    Route::post('/coupon/create', [CouponController::class, 'create'])->name('coupon.create');
    Route::delete('/coupon/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
    Route::get('/coupon/update', [CouponController::class, 'update'])->name('coupon.update');
    Route::post('/coupon/check', [CouponController::class, 'check'])->name('coupon.check');
    Route::post('/coupon/{id}/update/code', [CouponController::class, 'updateCode'])->name('coupon.update.code');
    Route::get('/coupons/export', [CouponController::class, 'export'])->name('coupons.export');
    Route::post('/coupons/import', [CouponController::class, 'import'])->name('coupons.import');
    Route::get('/coupon/restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');

    // Logs
    // Dashboard
    Route::get('/log/{id}', [LogController::class, 'get'])->name('log');
    Route::delete('/log/{id}', [LogController::class, 'delete'])->name('log.delete');

    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::get('pages/terms-of-use', [SettingController::class, 'get_terms_of_use'])->name('services.terms-of-use');
    Route::get('pages/about-us', [SettingController::class, 'get_about_us'])->name('services.about-us');
    Route::get('pages/privacy-and-policy', [SettingController::class, 'get_privacy_and_policy'])->name('services.privacy-and-policy');
    Route::get('pages/delivery', [SettingController::class, 'get_delivery'])->name('services.delivery');
    Route::get('pages/secure-payment', [SettingController::class, 'get_secure_payment'])->name('services.secure-payment');

    Route::get('settings/website', [SettingController::class, 'get_website'])->name('settings.website.get');
    Route::get('settings/application', [SettingController::class, 'get_application'])->name('settings.application.get');
    Route::get('settings/account', [SettingController::class, 'get_account'])->name('settings.account.get');

    Route::post('settings/account/upload/image', [SettingController::class, 'upload_image'])->name('settings.account.uploadImage');

    Route::post('/terms-of-use/update', [SettingController::class, 'update_terms_of_use'])->name('terms_of_use.update');
    Route::post('/about-us/update', [SettingController::class, 'update_about_us'])->name('about_us.update');
    Route::post('/privacy-and-policy/update', [SettingController::class, 'update_privacy_and_policy'])->name('privacy_and_policy.update');
    Route::post('/delivery/update', [SettingController::class, 'update_delivery'])->name('delivery.update');
    Route::post('/secure-payment/update', [SettingController::class, 'update_secure_payment'])->name('secure_payment.update');


    Route::get('/certificate', [CertificateController::class, 'generateCertificate'])->name('certificate.generate');


    Route::get('pages/pricing', function () {
        return view('content.pricing.index');
    })->name('pages.pricing');

    Route::get('/form-group-inputs', function () {
        return view('content.form-inputs.group-inputs');
    })->name('form-inputs.group-inputs');

    Route::get('/form-basic-inputs', function () {
        return view('content.form-inputs.basic-inputs');
    })->name('form-inputs.basic-inputs');

    // Components Routes
    Route::prefix('components')->group(function () {
        Route::get('/', function () {
            return view('content.components.index');
        })->name('components');

        Route::get('/buttons', function () {
            return view('content.components.buttons');
        })->name('buttons');

        Route::get('/cards', function () {
            return view('content.components.cards');
        })->name('cards');

        Route::get('/tables', function () {
            return view('content.components.tables');
        })->name('tables');

        Route::get('/forms', function () {
            return view('content.components.forms');
        })->name('forms');

        Route::get('/alerts', function () {
            return view('content.components.alerts');
        })->name('alerts');

        Route::get('/modals', function () {
            return view('content.components.modals');
        })->name('modals');

        Route::get('/navbars', function () {
            return view('content.components.navbars');
        })->name('navbars');

        Route::get('/progress-bars', function () {
            return view('content.components.progress-bars');
        })->name('progress-bars');

        Route::get('/tooltips', function () {
            return view('content.components.tooltips');
        })->name('tooltips');

        Route::get('/accordion', function () {
            return view('content.components.accordion');
        })->name('accordion');


        Route::get('/badges', function () {
            return view('content.components.badges');
        })->name('badges');

        Route::get('/breadcrumbs', function () {
            return view('content.components.breadcrumbs');
        })->name('breadcrumbs');

        Route::get('/dropdowns', function () {
            return view('content.components.dropdowns');
        })->name('dropdowns');

        Route::get('/paginations', function () {
            return view('content.components.paginations');
        })->name('paginations');

        Route::get('/popovers', function () {
            return view('content.components.popovers');
        })->name('popovers');

        Route::get('/tabs', function () {
            return view('content.components.tabs');
        })->name('tabs');

        Route::get('/toasts', function () {
            return view('content.components.toasts');
        })->name('toasts');

        Route::get('/typography', function () {
            return view('content.components.typography');
        })->name('typography');

        Route::get('/widgets', function () {
            return view('content.components.widgets');
        })->name('widgets');

        Route::get('/icons', function () {
            return view('content.components.icons');
        })->name('icons');

        Route::get('/rtl', function () {
            return view('content.components.rtl');
        })->name('rtl');

        Route::get('/utilities', function () {
            return view('content.components.utilities');
        })->name('utilities');

        Route::get('/carousel', function () {
            return view('content.components.carousels');
        })->name('carousel');


        Route::get('/list-group', function () {
            return view('content.components.list-groups');
        })->name('list-group');

        Route::get('/pills', function () {
            return view('content.components.pills');
        })->name('pills');

        Route::get('/spinners', function () {
            return view('content.components.spinners');
        })->name('spinners');

        Route::get('/placeholders', function () {
            return view('content.components.placeholders');
        })->name('placeholders');

        Route::get('/avatars', function () {
            return view('content.components.avatars');
        })->name('avatars');

    });


    Route::get('/charts', function () {
        return view('content.charts.index');
    })->name('charts');

    Route::get('/pages/icons', function () {
        return view('content.icons.index');
    })->name('pages.icons');

    Route::get('/pages/kanban', function () {
        return view('content.kanban.index');
    })->name('pages.kanban');

    Route::get('/pages/elearnings', function () {
        return view('content.elearnings.index');
    })->name('pages.elearnings');


    Route::get('/change-language/{locale}', [LanguageController::class, 'change'])->name('change.language');

    Route::get('/ddd', function () {
        // Clear cache
        Artisan::call('cache:clear');
        // Clear configuration cache
        Artisan::call('config:cache');
        // Clear routes
        Artisan::call('route:clear');
        // Cache routes
        Artisan::call('route:cache');
        // Cache views
        Artisan::call('view:cache');
        // Clear views
        Artisan::call('view:clear');

        return redirect()->back();
    });

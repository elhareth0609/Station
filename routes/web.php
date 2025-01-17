<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DataTabelController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubCategoryController;
use Dflydev\DotAccessData\Data;
use Google\Service\AdExchangeBuyerII\Product;
use Google\Service\Books\Category;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;















    Route::get('/', [HomeController::class, 'home'])->name('home');
    
    Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
        Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('auth/forgot-password', [AuthController::class, 'forgot_password'])->name('auth.forgot-password');
        Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login.action');
        Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register.action');
        Route::post('auth/forgot-password', [AuthController::class, 'forgot_password'])->name('auth.forgot-password.action');    
    });

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        
        Route::get('users', [DataTabelController::class, 'users'])->name('users');
        Route::get('datatabels', [DataTabelController::class, 'datatabels'])->name('datatabels');
        Route::get('google-sheet', [DataTabelController::class, 'google_sheet'])->name('google-sheet');
        Route::get('/orders/new', [DataTabelController::class, 'new_orders'])->name('orders.new');
        Route::get('/orders/completed', [DataTabelController::class, 'completed_orders'])->name('orders.completed');
        Route::get('/orders/progress', [DataTabelController::class, 'progress_orders'])->name('orders.progress');
        Route::get('products', [DataTabelController::class, 'products'])->name('products');
        Route::get('/cars', [DataTabelController::class, 'cars'])->name('cars');
        Route::get('orders', [DataTabelController::class, 'orders'])->name('orders');
        Route::get('categories', [DataTabelController::class, 'categories'])->name('categories');
        Route::get('sub-categories', [DataTabelController::class, 'sub_categories'])->name('sub-categories');
        Route::get('coupons', [DataTabelController::class, 'coupons'])->name('coupons');
        Route::get('languages', [DataTabelController::class, 'languages'])->name('languages');
        Route::get('file-manager', [DataTabelController::class, 'file_manager'])->name('file-manager');



        Route::get('logs', [DataTabelController::class, 'logs'])->name('logs');

        Route::get('logistics', [MapController::class, 'index'])->name('logistics');
        Route::get('/logistics/locations', [MapController::class, 'getLatestLocations'])->name('logistics.locations');

        Route::get('chat', [ChatController::class, 'index'])->name('chat');
        Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('chat.send-message');
        
        Route::get('email', [EmailController::class, 'index'])->name('email');
        Route::get('fullcalendar', [FullCalendarController::class, 'index'])->name('fullcalendar');


        
        Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::get('auth/destroy', [AuthController::class, 'destroy'])->name('auth.destroy');


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
        Route::post('/coupon/{id}/update/code', [CouponController::class, 'updateCode'])->name('coupon.update.code');
        Route::post('/coupons/check', [CouponController::class, 'check'])->name('coupons.check');
        Route::get('/coupons/generate', [CouponController::class, 'generate'])->name('coupons.generate');
        Route::get('/coupons/export', [CouponController::class, 'export'])->name('coupons.export');
        Route::post('/coupons/import', [CouponController::class, 'import'])->name('coupons.import');
        Route::get('/coupon/{id}/restore', [CouponController::class, 'restore'])->name('coupon.restore');

        // Catgories
        // Dashboard
        Route::get('/category/{id}', [CategoryController::class, 'get'])->name('category');
        Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('view/category/{id}', [CategoryController::class, 'view'])->name('category.view');

        Route::get('/categories/all', [CategoryController::class, 'all'])->name('categories.all');

        // Sub Catgories
        // Dashboard
        Route::get('/sub-category/{id}', [SubCategoryController::class, 'get'])->name('sub-category');
        Route::post('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
        Route::delete('/sub-category/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');
        Route::put('/sub-category/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
        Route::get('/sub-category/{id}/restore', [SubCategoryController::class, 'restore'])->name('sub-category.restore');

        // Logs
        // Dashboard
        Route::get('/log/{id}', [LogController::class, 'get'])->name('log');
        Route::delete('/log/{id}', [LogController::class, 'delete'])->name('log.delete');

        // Orders
        //Dashboard
        Route::get('/order/{id}', [OrderController::class, 'get'])->name('order');
        Route::delete('/order/{id}', [OrderController::class, 'delete'])->name('order.delete');
        Route::get('/order/{id}/restore', [OrderController::class, 'restore'])->name('order.restore');
        Route::post('/order/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');

        // Cars
        //Dashboard
        Route::get('/car/{id}', [CarController::class, 'get'])->name('car.get');
        Route::post('/car/create', [CarController::class, 'create'])->name('car.create');
        Route::put('/car/{id}', [CarController::class, 'update'])->name('car.update');
        Route::delete('/car/{id}', [CarController::class, 'delete'])->name('car.delete');

        // Cars
        //Dashboard

        Route::post('/files/upload', [FileController::class, 'upload'])->name('files.upload');
        Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');
        Route::get('/files/download/{file}', [FileController::class, 'download'])->name('files.download');

        Route::post('/folders/create', [FolderController::class, 'create'])->name('folders.create');
        Route::delete('/folders/{folder}', [FolderController::class, 'destroy'])->name('folders.destroy');
    

        // E-commerce
        Route::get('store', [StoreController::class, 'index'])->name('store');
        Route::get('cart', [StoreController::class, 'index'])->name('cart');
        // Route::get('checkout', [StoreController::class, 'index'])->name('checkout');

        // Products
        // Dashboard
        Route::get('/product/{id}', [ProductController::class, 'get'])->name('product.get');
        Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
        // Website
        Route::get('view/product/{id}', [ProductController::class, 'view'])->name('product.view');
        
        Route::post('/language', [LanguageController::class, 'create'])->name('language.create');
        Route::get('/language/{word}', [LanguageController::class, 'get'])->name('language.get');
        Route::put('/language/{word}', [LanguageController::class, 'update'])->name('language.update');
        Route::delete('/language/{word}', [LanguageController::class, 'destroy'])->name('language.destroy');
        
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

        Route::get('pages/terms-of-use', [SettingController::class, 'get_terms_of_use'])->name('services.terms-of-use');
        Route::get('pages/about-us', [SettingController::class, 'get_about_us'])->name('services.about-us');
        Route::get('pages/privacy-and-policy', [SettingController::class, 'get_privacy_and_policy'])->name('services.privacy-and-policy');
        Route::get('pages/delivery', [SettingController::class, 'get_delivery'])->name('services.delivery');
        Route::get('pages/secure-payment', [SettingController::class, 'get_secure_payment'])->name('services.secure-payment');
        
        Route::get('settings/website', [SettingController::class, 'get_website'])->name('settings.website.get');
        Route::get('settings/application', [SettingController::class, 'get_application'])->name('settings.application.get');
        Route::get('settings/account', [SettingController::class, 'get_account'])->name('settings.account.get');

        Route::post('settings/account/update', [SettingController::class, 'update_account'])->name('settings.account.update');

        Route::post('settings/account/upload/image', [SettingController::class, 'upload_image'])->name('settings.account.uploadImage');

        Route::post('/terms-of-use/update', [SettingController::class, 'update_terms_of_use'])->name('terms_of_use.update');
        Route::post('/about-us/update', [SettingController::class, 'update_about_us'])->name('about_us.update');
        Route::post('/privacy-and-policy/update', [SettingController::class, 'update_privacy_and_policy'])->name('privacy_and_policy.update');
        Route::post('/delivery/update', [SettingController::class, 'update_delivery'])->name('delivery.update');
        Route::post('/secure-payment/update', [SettingController::class, 'update_secure_payment'])->name('secure_payment.update');


        Route::get('/certificate', [CertificateController::class, 'generateCertificate'])->name('certificate.generate');

        Route::post('/certificate/pdf', [CertificateController::class, 'pdf'])->name('certificate.pdf');


        Route::get('apps/tinymce', [AppsController::class, 'tinymce'])->name('apps.tinymce');
        Route::get('apps/select', [AppsController::class, 'select'])->name('apps.select');
        Route::get('apps/tag', [AppsController::class, 'tag'])->name('apps.tag');
        Route::get('apps/wizard', [AppsController::class, 'wizard'])->name('apps.wizard');
        Route::post('apps/tinymce', [AppsController::class, 'tinymce_store'])->name('apps.tinymce.store');
        


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

    });

    Route::get('/ddd', function () {
        // Clear cache
        Artisan::call('cache:clear');
        // Clear configuration cache
        Artisan::call('config:cache');
        // Clear configuration
        Artisan::call('config:clear');
        // Clear routes
        Artisan::call('route:clear');
        // Cache routes
        Artisan::call('route:cache');
        // Cache views
        Artisan::call('view:cache');
        // Clear views
        Artisan::call('view:clear');
        
        // back to past page
        return 'ok';
    });

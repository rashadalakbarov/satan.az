<?php

use Illuminate\Support\Facades\Route;

// client ==================================>
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddNewController;
use App\Http\Controllers\DetailController;

// profile 
use App\Http\Controllers\profile\ProfileDashboardController;

// for admin ==================================>
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminMyCompanyController;
use App\Http\Controllers\admin\AdminCityController;
use App\Http\Controllers\admin\AdminElanlarController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminOptionController;
use App\Http\Controllers\admin\AdminOptionValueController;
use App\Http\Controllers\admin\AdminRulesCompany;






// client ==================================>
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/rules', [HomeController::class, 'rules'])->name('rules');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::prefix('new')->controller(AddNewController::class)->name('new.')->group(function(){
    Route::get('/', 'index')->name('index');    
    Route::post('/', 'store')->name('store');
    Route::get('/get-options/{category_id}', 'getOptions')->name('get-options');
    Route::get('/get-option-values/{option_id}', 'getOptionValues')->name('get-optionvalue');
});

Route::get('/elanlar', [DetailController::class, 'index'])->name('detail');

Route::controller(AuthController::class)->middleware(['profile.guest'])->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/send-otp', 'sendOtp')->name('send-otp');
    Route::get('/verify-otp', 'verifyOtpForm')->name('verify-otp.form');
    Route::post('/verify-otp', 'verifyOtp')->name('verify-otp');
});

// profile ==================================>
Route::prefix('profile')->middleware(['web', 'auth:phone'])->name('profile.')->group(function(){
    Route::get('/', [ProfileDashboardController::class, 'index'])->name('index');
    Route::get('/logout', [ProfileDashboardController::class, 'logout'])->name('logout');

    Route::put('/user/{phone}', [ProfileDashboardController::class, 'user'])->name('user.update');
});

// admin ==================================>
Route::prefix('admin')->name('admin.')->group(function(){
    Route::group(['middleware'=> 'admin.guest'], function(){
        Route::get('/index', [AdminAuthController::class,'index'])->name('index');
        Route::post('/index', [AdminAuthController::class,'authenticate'])->name('index.auth');
    });

    Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AdminAuthController::class,'logout'])->name('logout');

        // company settings
        Route::name('mycompany.')->controller(MyCompanyController::class)->group(function (){
            Route::get('/my-company', 'edit')->name('edit');
            Route::post('/my-company', 'update')->name('update');
            Route::post('/my-company/contact', 'contact')->name('contact');
            Route::post('/my-company/social', 'social')->name('social');
            Route::post('/my-company/about', 'about')->name('about');
        });
        

        // cities
        Route::name('cities.')->controller(CityController::class)->group(function (){
            Route::get('/cities', 'index')->name('index');
            Route::post('/cities', 'store')->name('store');
            Route::get('/cities/{id}', 'show')->name('show');
            Route::put('/cities/{id}', 'update')->name('update');
            Route::delete('/cities/{id}', 'delete')->name('delete');
        });

        // elanlar
        Route::name('elanlar.')->controller(ElanlarController::class)->group(function (){
            Route::get('/elanlar', 'index')->name('index');
            Route::get('/elanlar/{id}', 'show')->name('show');
            Route::post('/elanlar/{id}', 'update')->name('update');
            Route::get('/get-option-values/{option_id}', 'getOptionValues')->name('get-optionvalue');
        });

        // categories
        Route::resource('categories', CategoryController::class);

        // rules
        Route::resource('rules', RulesCompany::class);

        // options
        Route::resource('options', OptionController::class);

        // option value
        Route::name('suboptions.')->controller(OptionValueController::class)->group(function (){
            Route::get('/suboptions', 'index')->name('index');
            Route::post('/suboptions', 'store')->name('store');
            Route::get('/suboptions/{id}', 'show')->name('show');
            Route::put('/suboptions/{id}', 'update')->name('update');
            Route::delete('/suboptions/{id}', 'delete')->name('delete');
        });
    });
});

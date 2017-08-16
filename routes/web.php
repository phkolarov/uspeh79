<?php


Route::get('//','InformationController@homepage')->name('welcome');
Route::get('/category-a','CategoryController@categoryA')->name('category-a');
Route::get('/category-a1','CategoryController@categoryA1')->name('category-a1');
Route::get('/category-a2','CategoryController@categoryA2')->name('category-a2');
Route::get('/category-be', 'CategoryController@categoryBE')->name('categorybe');
Route::get('/category-b', 'CategoryController@categoryB')->name('category-b');
Route::get('/category-c', 'CategoryController@categoryC')->name('category-c');
Route::get('/category-d', 'CategoryController@categoryD')->name('category-d');
Route::get('/category-ad', 'CategoryController@categoryADR')->name('adr');
Route::get('/category-pr', 'CategoryController@categoryPro')->name('prof');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/prices', 'PriceController@CoursesPrice')->name('prices');
Route::get('/prices-qualified', 'PriceController@QualifiedCoursesPrice')->name('prices-qualified-courses');
Route::get('/about-us', 'InformationController@AboutUs')->name('about-us');
Route::get('/contacts', 'InformationController@Contacts')->name('contacts');
Route::post('/send-email', 'InformationController@SendEmail')->name('send-mail');
Route::get('/news', 'NewsController@News')->name('news');
Route::get('/news/{id}/{title?}', 'NewsController@CurrentArticle')->name('current-article');

Auth::routes();

Route::get('/administration', 'HomeController@index')->name('home');
Route::get('/administrator/welcome', 'AdministratorController@welcome')->name('administrator-welcome');
Route::get('/administrator/change-article', 'AdministratorController@changeArticle')->name('change-article');
Route::get('/administrator/change-article/{filter}', 'AdministratorController@changeArticleFilter')->name('change-article-filter');
Route::get('/administrator/change-current-article/{id}', 'AdministratorController@changeCurrentArticle')->name('change-current-article');
Route::post('/administrator/save-current-article/{id}', 'AdministratorController@saveCurrentArticle')->name('save-current-article');
Route::get('/administrator/change-prices', 'AdministratorController@changePrices')->name('change-prices');
Route::get('/administrator/change-current-price/{id}', 'AdministratorController@changeCurrentPrice')->name('change-current-price');
Route::post('/administrator/save-current-price/{id}', 'AdministratorController@saveCurrentPrice')->name('save-current-price');
Route::get('/administrator/slider', 'AdministratorController@slider')->name('slider');
Route::post('/administrator/uploadImage', 'AdministratorController@sliderImageUpload')->name('slider-image-upload');
Route::get('/administrator/deleteImage/{name}', 'AdministratorController@deleteImage')->name('delete-slider-image');
Route::get('/administrator/loadToSlider/{name}', 'AdministratorController@loadToSlider')->name('load-slider-image');
Route::get('/administrator/removeSlide/{id}', 'AdministratorController@removeSlide')->name('remove-slide');
Route::get('/administrator/gallery', 'AdministratorController@gallery')->name('gallery-administration');
Route::get('/administrator/delete-gallery-image/{id}', 'AdministratorController@deleteImageGallery')->name('delete-gallery-image');
Route::get('/administrator/gallery/{filter}', 'AdministratorController@galleryFilter')->name('gallery-filter');
Route::post('/administrator/gallery/upload-gallery-image', 'AdministratorController@uploadGalleryImage')->name('upload-gallery-image');
Route::get('/administrator/course-information', 'AdministratorController@courseInformation')->name('course-information-administration');
Route::get('/administrator/change-course-information/{id}', 'AdministratorController@changeCourseInformation')->name('change-course-information');
Route::post('/administrator/save-course-information/{id}', 'AdministratorController@saveCourseInformation')->name('save-course-information');
Route::post('/administrator/delete-article/{id}', 'AdministratorController@deleteArticle')->name('delete-article');


// Authentication Routes...
Route::get('administrator/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('administrator/login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('administrator/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('administrator/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('administrator/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('administrator/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'InformationController@none'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'InformationController@none'
]);

Route::get('/clear-cache', function() {
    $exitCode = \Illuminate\Support\Facades\Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});


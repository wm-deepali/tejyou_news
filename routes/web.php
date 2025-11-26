<?php
                                                                                                                                                                                                                                                                          

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Spatie\PdfToImage\Pdf;
use App\Epaper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/symlink', function () {
    Artisan::call('storage:link');
});
Route::get('pdf-to-jpg',function(){
    foreach(Epaper::all() as $pdf1){
      echo  $pdfPath = public_path('storage/'.$pdf1->file);

        // Create a Pdf object
        $pdf = new Pdf($pdfPath);
        $pdf->getNumberOfPages();
        // Convert the first page of the PDF to an image
        // $imageContent = $pdf->setPage(1)->output();
        // $imagePath = 'epaperimage/'.date('mdYHis') . str_rand(1000,99999) .'.jpg';
        // // Storage::put($imagePath, $imageContent);
        // $pdf1->update(['image'=>$imagePath]);
        
    }
});
Route::get('videos',function(){
return view('front.videos');
});
Route::get('searchs',function(){
return view('front.searchs');
});
Route::get('e-paper-header',function(){
return view('front.e-paper-header');
});
Route::get('advertisement',function(){
return view('front.advertisement');
});
Route::get('footer-two',function(){
return view('front.footer-two');
});
Route::get('rashifal',function(){
return view('front.rashifal');
});
Route::get('nevigation',function(){
return view('front.nevigation');
});
Route::get('faq',function(){
return view('front.faq');
});
Route::get('/','FrontController@index')->name('/');
Route::get('become-a-reporter','FrontController@becomeareporter')->name('become-a-reporter');
Route::get('fetchVideos','FrontController@fetchVideos')->name('fetchVideos');
Route::post('submit-become-a-reporter','FrontController@storebecomeareporter')->name('submit-become-a-reporter');
Route::post('fetchcitybystateid','FrontController@fetchcitybystateid');
Route::get('news/{categoryurl}/{subcategoryurl?}','FrontController@postbycategory')->name('postbycategory');
Route::get('cities/{subcategoryurl}','FrontController@postbysubcategory')->name('postbysubcategory');

Route::get('about-us','FrontController@aboutus')->name('about-us');
Route::get('contact-us','FrontController@contactus')->name('contact-us');
Route::get('cookie-policy','FrontController@cookiepolicy')->name('cookie-policy');
Route::get('privacy-policy','FrontController@privacypolicy')->name('privacy-policy');
Route::get('terms-of-use','FrontController@termsofuse')->name('terms-of-use');
Route::get('our-team','FrontController@ourteam')->name('our-team');
Route::post('add-comment','FrontController@addcomment');
Route::post('add-comment-reply/{id}','FrontController@addcommentreply');
Route::get('search','FrontController@search')->name('search');
Route::get('searchpost','FrontController@searchsdata')->name('searchpost');
Route::post('add-contact-us','FrontController@addcontactus');

Route::post('add-subscriber','FrontController@addsubscriber')->name('add-subscriber');
Route::post('submit-poll','FrontController@submitpoll');
Route::get('e-paper','FrontController@epaper')->name('e-paper');
Route::post('filter-epaper','FrontController@filterepaper');
Route::get('fetch-epaper-by-date/{date}','FrontController@fetchepaperbydate');

Route::get('custom-function','FrontController@customfunction')->name('custom-function');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('manage-category', 'CategoryController');
Route::post('add-category','CategoryController@store');
Route::put('change-category-status/{id}/{status}','CategoryController@changestatus');
Route::resource('manage-subcategory', 'SubcategoryController');
Route::put('change-subcategory-status/{id}/{status}','SubcategoryController@changestatus');
Route::resource('manage-tag', 'TagController');
Route::put('change-tag-status/{id}/{status}','TagController@changestatus');
Route::resource('manage-post', 'PostController');
Route::post('update-post/{id}', 'PostController@update');
Route::get('view-user-info/{id}', 'PostController@viewuserinfo');
Route::put('publish-post/{id}', 'PostController@publishpost');
Route::put('change-post-status/{id}/{status}','PostController@changestatus');
Route::post('fetch-subcategory-by-category','PostController@fetchsubcategorybycategory');
Route::post('search-image-by-tag','PostController@searchimagebytag')->name('search-image-by-tag');
Route::resource('manage-comment', 'CommentController');
Route::resource('manage-reporter', 'ReporterController');
Route::post('update-reporter/{id}', 'ReporterController@update');
Route::post('approve-reporter/{id}', 'ReporterController@approve');
Route::put('approve-reporter-submit/{id}', 'ReporterController@approvesubmit');
Route::get('edit-password-reporter/{id}', 'ReporterController@editpassword');
Route::put('update-password-reporter/{id}', 'ReporterController@updatepassword');
Route::get('manage-header-setting','SitesettingController@editheadersetting')->name('manage-header-setting');
Route::post('update-header-setting','SitesettingController@updateheadersetting')->name('update-header-setting');
Route::get('manage-footer-setting','SitesettingController@editfootersetting')->name('manage-footer-setting');
Route::post('update-footer-setting','SitesettingController@updatefootersetting')->name('update-footer-setting');
Route::get('manage-homepage-widget','SitesettingController@edithomepagewidget')->name('manage-homepage-widget');
Route::post('update-homepage-widget','SitesettingController@updatehomepagewidget')->name('update-homepage-widget');
Route::get('manage-profile','ProfileController@edit')->name('manage-profile');
Route::post('update-profile','ProfileController@update')->name('update-profile');
Route::post('update-profile-password','ProfileController@updatepassword')->name('update-profile-password');
Route::post('create-post-url','PostController@createposturl');
Route::post('add-post-draft','PostController@addpostdraft');
Route::post('update-post-draft/{id}', 'PostController@updatepostdraft');
Route::put('approve-comment/{id}','CommentController@approvecomment');
Route::get('edit-about-us','WebsitesettingController@editaboutus')->name('edit-about-us');
Route::post('update-about-us','WebsitesettingController@updateaboutus')->name('update-about-us');
Route::get('edit-cookie-policy','WebsitesettingController@editcookiepolicy')->name('edit-cookie-policy');
Route::post('update-cookie-policy','WebsitesettingController@updatecookiepolicy')->name('update-cookie-policy');
Route::get('edit-privacy-policy','WebsitesettingController@editprivacypolicy')->name('edit-privacy-policy');
Route::post('update-privacy-policy','WebsitesettingController@updateprivacypolicy')->name('update-privacy-policy');
Route::get('edit-terms-of-use','WebsitesettingController@edittermsofuse')->name('edit-terms-of-use');
Route::post('update-terms-of-use','WebsitesettingController@updatetermsofuse')->name('update-terms-of-use');
Route::get('manage-contact-us','WebsitesettingController@managecontactus')->name('manage-contact-us');
Route::delete('delete-contact-us/{id}','WebsitesettingController@deletecontactus')->name('delete-contact-us');

Route::resource('manage-epaper', 'EpaperController');
Route::resource('manage-site-intro', 'SiteIntroController');
Route::get('change-status-epaper/{id}','EpaperController@changestatus')->name('change-status-epaper');
Route::resource('manage-team', 'TeamController');
Route::get('change-status-team/{id}','TeamController@changestatus')->name('change-status-team');
Route::resource('manage-subscriber', 'SubscriberController');
Route::get('change-status-subscriber/{id}','SubscriberController@changestatus')->name('change-status-subscriber');
Route::resource('manage-question-of-the-day', 'QuestionofthedayController');
Route::get('change-status-question-of-the-day/{id}','QuestionofthedayController@changestatus')->name('change-status-question-of-the-day');
Route::resource('manage-team-category', 'TeamcategoryController');
Route::get('change-status-team-category/{id}','TeamcategoryController@changestatus')->name('change-status-team-category');

Route::resource('manage-ad', 'AdController');
Route::get('view-client-detail/{id}','AdController@viewclientdetail')->name('view-client-detail');
Route::get('view-payment-detail/{id}','AdController@viewpaymentdetail')->name('view-payment-detail');
Route::get('stop-ad/{id}','AdController@stopad')->name('stop-ad');
Route::post('update-ad/{id}','AdController@update')->name('update-ad');
Route::get('ad-setting','AdsettingController@adsetting')->name('ad-setting');
Route::post('update-ad-setting','AdsettingController@updateadsetting')->name('update-ad-setting');

Route::get('manage-report','PostController@managereport')->name('manage-report');
Route::get('fetchsubcategories/{id}','PostController@fetchsubcategories');
Route::post('generate-report','PostController@generatereport')->name('generate-report');
Route::get('/{slug}','FrontController@index')->name('homecategory');
Route::get('/{categoryurl}/{posturl}/detail','FrontController@postdetail')->name('postdetail');
Route::get('/{posturl}/detail','FrontController@postdetails')->name('postdetails');
<?php

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

Route::get('/','HomeController@getHomePage')->name('home');
//Route::get('/package','HomeController@getPackagePage')->name('package');



Auth::routes();
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');

Route::get('/logout','Auth\LoginController@logout')->name('logout');
// Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

Route::get('/adminProfile', 'AdminController@adminProfile');
Route::get('/profileEdit/{id}', 'AdminController@profileEdit');
Route::post('/profileUpdate/{id}', 'AdminController@profileUpdate');




Route::get('/adminRegister', 'AdminController@adminRegister');
Route::post('/adminInsert', 'AdminController@adminInsert');
Route::get('/adminView', 'AdminController@adminView');
Route::get('/editAdmin/{id}', 'AdminController@editAdmin');
Route::post('/adminUpdate/{id}', 'AdminController@adminUpdate');
Route::get('/adminDelete/{id}', 'AdminController@adminDelete');

Route::get('adminActiveStatus/{id}','AdminController@adminActiveStatus');
Route::get('adminInactiveStatus/{id}','AdminController@adminInactiveStatus');




Route::get('/products/{id}','HomeController@productPage')->name('products');
Route::get('/media/{id}','HomeController@mediaPage');
Route::get('/supportteam','HomeController@supportPage')->name('support');

//Complain
Route::get('/complain','HomeController@complainPage')->name('complain');
Route::post('/insertComplain','HomeController@insertComplain');
Route::get('/viewcomplain','HomeController@viewComplain')->middleware('auth');
Route::get('/deleteComplain/{id}','HomeController@deleteComplain');
Route::get('/replyComplain/{id}','HomeController@replyComplain');

//Contact
Route::get('/contact','HomeController@contactPage');
Route::post('/insertContactMessage','HomeController@insertContactMessage');
Route::get('/viewcontact','HomeController@viewContact')->middleware('auth');
Route::get('/deleteContact/{id}','HomeController@deleteContact');
Route::get('/replyContact/{id}','HomeController@replyContact');

Route::post('/insertReply','HomeController@insertReply');
//Package Order
Route::post('/packageOrder','HomeController@packageOrder');
Route::get('/viewpackageOrder','HomeController@viewpackageOrder')->middleware('auth');
Route::get('/delPackOrder/{id}','HomeController@HomeController@');

Route::get('/packageDone/{id}','HomeController@packageDone');
Route::get('/packagePending/{id}','HomeController@packagePending');

//Product Order
Route::post('/productOrder','HomeController@productOrder');
Route::get('/viewproductOrder','HomeController@viewproductOrder')->middleware('auth');
Route::get('/delProOrder/{id}','HomeController@delProOrder');

Route::get('/productDone/{id}','HomeController@productDone');
Route::get('/productPending/{id}','HomeController@productPending');

//Packages 
Route::get('/addPackage','PackageController@addPackage');
Route::post('/insertPackage','PackageController@insertPackage');
Route::get('/viewPackage','PackageController@viewPackage');
Route::get('/editPackage/{id}','PackageController@editPackage');
Route::post('/updatePackage/{id}','PackageController@updatePackage');
Route::get('/deletePackage/{id}','PackageController@deletePackage');

Route::get('packageActiveStatus/{id}','PackageController@packageActiveStatus');
Route::get('packageInactiveStatus/{id}','PackageController@packageInactiveStatus');


//Media Subcateogory 
Route::get('/addMsubcategory','MediaController@addMsubcategory');
Route::post('/insertMsubcategory','MediaController@insertMsubcategory');
Route::get('/viewMsubcategory','MediaController@viewMsubcategory');
Route::get('/editMsubcategory/{id}','MediaController@editMsubcategory');
Route::post('/upadateMsubcategory/{id}','MediaController@updateMsubcategory');
Route::get('/deleteMsubcategory/{id}','MediaController@deleteMsubcategory');

Route::get('subMActiveStatus/{id}','MediaController@subMActiveStatus');
Route::get('subMInactiveStatus/{id}','MediaController@subMInactiveStatus');


//Media 
Route::get('/addMedia','MediaController@addMedia');
Route::post('/insertMedia','MediaController@insertMedia');
Route::get('/viewMedia','MediaController@viewMedia');
Route::get('/editMedia/{id}','MediaController@editMedia');
Route::post('/updateMedia/{id}','MediaController@updateMedia');
Route::get('/deleteMedia/{id}','MediaController@deleteMedia');


Route::get('mediaActiveStatus/{id}','MediaController@mediaActiveStatus');
Route::get('mediaInactiveStatus/{id}','MediaController@mediaInactiveStatus');

//Product Subcateogory 
Route::get('/addPsubcategory','ProductController@addPsubcategory');
Route::post('/insertPsubcategory','ProductController@insertPsubcategory');
Route::get('/viewPsubcategory','ProductController@viewPsubcategory');
Route::get('/editPsubcategory/{id}','ProductController@editPsubcategory');
Route::post('/upadatePsubcategory/{id}','ProductController@updatePsubcategory');
Route::get('/deletePsubcategory/{id}','ProductController@deletePsubcategory');


Route::get('pSubActiveStatus/{id}','ProductController@pSubActiveStatus');
Route::get('pSubInactiveStatus/{id}','ProductController@pSubInactiveStatus');


//Product 
Route::get('/addProduct','ProductController@addProduct');
Route::post('/insertProduct','ProductController@insertProduct');
Route::get('/viewProduct','ProductController@viewProduct');
Route::get('/editProduct/{id}','ProductController@editProduct');
Route::post('/updateProduct/{id}','ProductController@updateProduct');
Route::get('/deleteProduct/{id}','ProductController@deleteProduct');

Route::get('productActiveStatus/{id}','ProductController@productActiveStatus');
Route::get('productInactiveStatus/{id}','ProductController@productInactiveStatus');


//Support
Route::get('/addSupport','SupportController@addSupport');
Route::post('/insertSupport', 'SupportController@insertSupport');
Route::get('/viewSupport','SupportController@viewSupport');
Route::get('/deleteSupport/{id}','SupportController@deleteSupport');
Route::get('/editSupport/{id}','SupportController@editSupport');
Route::post('/updateSupport/{id}','SupportController@updateSupport');

Route::get('supportActiveStatus/{id}','SupportController@supportActiveStatus');
Route::get('supportInactiveStatus/{id}','SupportController@supportInactiveStatus');

//Slider
Route::get('/addSlider','SliderController@addSlider');
Route::post('/insertSlider','SliderController@insertSlider');
Route::get('/viewSlider','SliderController@viewSlider');
Route::get('/editSlider/{id}','SliderController@editSlider');
Route::post('/updateSlider/{id}','SliderController@updateSlider');
Route::get('/deleteSlider/{id}','SliderController@deleteSlider');

Route::get('sliderActiveStatus/{id}','SliderController@sliderActiveStatus');
Route::get('sliderInactiveStatus/{id}','SliderController@sliderInactiveStatus');


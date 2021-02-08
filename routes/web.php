<?php

use App\Http\Middleware\LoginAuthentication;

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

// ======================================= User Routes ==========================================================

Route::get('/', 'UserController@getLoginPage');

Route::get('/user/getwindowsdata/{id}', 'UserController@getWindowsData');

Route::get('/home', 'UserController@getDashboard')->middleware(LoginAuthentication::class);

Route::get('/reports', 'UserController@getReports')->middleware(LoginAuthentication::class);
Route::get('/individualreport/{id}', 'UserController@individualreport')->middleware(LoginAuthentication::class);

Route::get('/kpi', 'UserController@getKpiReports')->middleware(LoginAuthentication::class);
Route::get('/kpibranch', 'UserController@getKpiBranchReports')->middleware(LoginAuthentication::class);

Route::get('/user/dashboard', 'UserController@getDashboard')->middleware(LoginAuthentication::class);

Route::get('/login', 'UserController@getLoginPage');

Route::get('/user/logout', 'UserController@logout')->middleware(LoginAuthentication::class);

Route::get('/getcategoryiframes', 'UserController@getCategoryIframes')->middleware(LoginAuthentication::class);
Route::get('/getcategorydata', 'UserController@getCategoryData')->middleware(LoginAuthentication::class);
Route::get('/getkpiCategoryData', 'UserController@getkpiCategoryData')->middleware(LoginAuthentication::class);

Route::get('/getkpicategoryiframes', 'UserController@getKpiCategoryIframes');


Route::get('/iframes', 'UserController@iframes');

Route::get('/admin/useredit/{user_id}', 'AdminController@useredit')->middleware(LoginAuthentication::class);

Route::post('/admin/updateclient', 'AdminController@updateclient')->middleware(LoginAuthentication::class);

Route::get('/admin/clientlist', 'AdminController@clientlist')->middleware(LoginAuthentication::class);


Route::get('/signup', 'UserController@getRegisterPage');
Route::post('/userregister', 'UserController@userregister');



// office 365 functions
Route::get('/signin', 'AuthController@signin');
Route::get('/callback', 'AuthController@callback');
Route::get('/signout', 'AuthController@signout');

//  ======================================= Admin Routes ========================================================

Route::get('/admin', 'AdminController@getLoginPage');

Route::get('/admin/login', 'AdminController@getLoginPage');

Route::post('/admin/checklogin', 'AdminController@checkLogin');

Route::post('/admin/usercheckLogin', 'AdminController@usercheckLogin');
Route::post('/admin/userchecklogin', 'AdminController@usercheckLogin');



Route::get('/admin/dashboard', 'AdminController@getDashboard')->middleware(LoginAuthentication::class);

Route::get('/admin/listreport', 'AdminController@listReportPage')->middleware(LoginAuthentication::class);

Route::get('/admin/addreport', 'AdminController@addReportPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addreport','AdminController@addReport')->middleware(LoginAuthentication::class);

Route::get('/admin/updatereport/{report_id}', 'AdminController@updateReportPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatereport', 'AdminController@updateReport')->middleware(LoginAuthentication::class);

Route::get('/admin/deletereport/{report_id}', 'AdminController@deleteReport')->middleware(LoginAuthentication::class);

Route::get('/admin/listsubcategory', 'AdminController@listSubCategoryPage')->middleware(LoginAuthentication::class);

Route::get('/admin/addsubcategory', 'AdminController@addSubCategoryPage')->middleware(LoginAuthentication::class);

Route::get('/admin/gettabcategories', 'AdminController@getTabCategories')->middleware(LoginAuthentication::class);

Route::post('/admin/addsubcategory', 'AdminController@addSubCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/updatesubcategory/{subcategory_id}', 'AdminController@updateSubCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatesubcategory', 'AdminController@updateSubCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/deletesubcategory/{subcategory_id}', 'AdminController@deleteSubCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/getcategorysubcategories', 'AdminController@getCategorySubCategories')->middleware(LoginAuthentication::class);

Route::get('/admin/logout', 'AdminController@logout')->middleware(LoginAuthentication::class);

Route::get('/admin/listtabs', 'AdminController@listTabs')->middleware(LoginAuthentication::class);

Route::get('/admin/addtab', 'AdminController@addTabPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addtab', 'AdminController@addTab')->middleware(LoginAuthentication::class);

Route::get('/admin/updatetab/{tab_id}', 'AdminController@updateTabPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatetab', 'AdminController@updateTab')->middleware(LoginAuthentication::class);

Route::get('/admin/deletetab/{tab_id}', 'AdminController@deleteTab')->middleware(LoginAuthentication::class);

Route::get('/admin/listcategory', 'AdminController@listCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/addcategory', 'AdminController@addCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addcategory', 'AdminController@addCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/updatecategory/{category_id}', 'AdminController@updateCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatecategory', 'AdminController@updateCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/deletecategory/{category_id}', 'AdminController@deleteCategory')->middleware(LoginAuthentication::class);


// KPI tab menu routes
Route::get('/admin/listkpitabs', 'AdminController@listKpiTabs')->middleware(LoginAuthentication::class);

Route::get('/admin/addkpitab', 'AdminController@addKpiTabPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addkpitab', 'AdminController@addKpiTab')->middleware(LoginAuthentication::class);

Route::get('/admin/updatekpitab/{tab_id}', 'AdminController@updateKpiTabPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatekpitab', 'AdminController@updateKpiTab')->middleware(LoginAuthentication::class);

Route::get('/admin/deletekpitab/{tab_id}', 'AdminController@deleteKpiTab')->middleware(LoginAuthentication::class);


// KPI categories menu routes
Route::get('/admin/listkpicategory', 'AdminController@listKpiCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/addkpicategory', 'AdminController@addKpiCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addkpicategory', 'AdminController@addKpiCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/updatekpicategory/{category_id}', 'AdminController@updateKpiCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatekpicategory', 'AdminController@updateKpiCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/deletekpicategory/{category_id}', 'AdminController@deleteKpiCategory')->middleware(LoginAuthentication::class);


// KPI sub categories menu routes
Route::get('/admin/listkpisubcategory', 'AdminController@listKpiSubCategoryPage')->middleware(LoginAuthentication::class);

Route::get('/admin/addkpisubcategory', 'AdminController@addKpiSubCategoryPage')->middleware(LoginAuthentication::class);

Route::get('/admin/getkpitabcategories', 'AdminController@getKpiTabCategories')->middleware(LoginAuthentication::class);

Route::post('/admin/addkpisubcategory', 'AdminController@addKpiSubCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/updatekpisubcategory/{subcategory_id}', 'AdminController@updateKpiSubCategoryPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatekpisubcategory', 'AdminController@updateKpiSubCategory')->middleware(LoginAuthentication::class);

Route::get('/admin/deletekpisubcategory/{subcategory_id}', 'AdminController@deleteKpiSubCategory')->middleware(LoginAuthentication::class);

// KPI report routes
Route::get('/admin/listkpireport', 'AdminController@listKpiReportPage')->middleware(LoginAuthentication::class);

Route::get('/admin/addkpireport', 'AdminController@addKpiReportPage')->middleware(LoginAuthentication::class);

Route::post('/admin/addkpireport','AdminController@addKpiReport')->middleware(LoginAuthentication::class);

Route::get('/admin/updatekpireport/{report_id}', 'AdminController@updateKpiReportPage')->middleware(LoginAuthentication::class);

Route::post('/admin/updatekpireport', 'AdminController@updateKpiReport')->middleware(LoginAuthentication::class);

Route::get('/admin/deletekpireport/{report_id}', 'AdminController@deleteKpiReport')->middleware(LoginAuthentication::class);

Route::get('/admin/getkpicategorysubcategories', 'AdminController@getKpiCategorySubCategories')->middleware(LoginAuthentication::class);

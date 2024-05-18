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
// Route::get('/form', 'Controller@form')->name('form');
// Route::post('submit_form', 'Controller@submit_form')->name('submit_form');
// Route::get('success', 'Controller@success')->name('success');
// Route::get('/', function () {
//     return view('cardsOption');
// });

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/user/options', 'HomeController@cardOpt');

// Route::get('/proposal/form/{id}', 'ProposalController@index')->name('formProposedName');
Route::get('/proposal/form/{id}', 'ProposalController@index')->name('formFoundationDate');


Route::get('/proposal/getVillageName', 'ProposalController@ajaxGetRevenueVillages')->name('getVillageName');

Route::get('/proposal/getBlocks', 'ProposalController@ajaxGetBlocks')->name('getBlocksName');

Route::get('/proposal/getGp', 'ProposalController@ajaxGetGp')->name('getGpName');

Route::get('/proposal/getSuggestedVillages', 'ProposalController@ajaxGetVillages')->name('getSuggestedVillages');

Route::get('/proposal/getCategoryLabel', 'ProposalController@ajaxGetCategoryLabel')->name('getCategoryLabel');

Route::post('/proposal/sendData', 'ProposalController@sendProposal')->name('sendData');

Route::get('/user/getAcknowledgement', 'ProposalController@acknowledgementPrint')->name('getAcknowledgement');
Route::get('/user/getAcknowledgementVillName', 'ProposalController@acknowledgementVillNamePrint')->name('getAcknowledgementVillName');

Route::get('/user/download-document/{id}', 'ProposalController@downloaddocument')->name('downloaddocument');

Route::get('/acknowledge/{type}/{proposal}', 'ProposalController@viewAcknowledgement');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-dashboard', 'ProposalController@dashboard');

Route::get('/user-datatable-list', 'ProposalController@submittedRequest')->name('requestsData');

Route::get('/user-requestSubmitted', 'ProposalController@submittedRequest');
Route::get('/user-requestView', 'ProposalController@viewSubmittedRequest');

Route::get('/user-ackHistory/{id}', 'ProposalController@ackHistory');

// Route::get('/get_users', 'UtilityController@generateUser');

//Admin Panel
Route::middleware(['admin_Middleware'])->group(function () {

    // Route::get('/count', 'AdminController@countProposal');

    Route::get('/admin/dashboard', 'AdminController@dashboard');
    // Route::get('users-list', 'AdminController@getData');

    Route::get('/admin-user-requestSubmitted', 'AdminController@adminSubmittedRequest')->name('adminDatatable');

    // Route::get('/admin-user-requestView', 'AdminController@adminViewSubmittedRequest');
});

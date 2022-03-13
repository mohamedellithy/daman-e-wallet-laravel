<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('switch/{lang}', function($lang){
    if(in_array($lang,['en','ar','fr'])){
      session(['locale'=> $lang]);
    }
    return back();
});

Route::get('pay/me/{id}','PaymentController@pay_me')->where('id','[0-9]+');
Route::middleware(['member'])->group(function(){
    Route::any('wallets/{slug?}', function ($slug = null) {
        return view('wallet.index')->with('menu_active', 'wallets');
    })->where('slug', '.*')->name('wallets');

    Route::any('tickets/{slug?}', function ($slug = null) {
        return view('tickets.index')->with('menu_active', 'tickets');
    })->where('slug', '.*');

    Route::resource('payments', 'PaymentController');
    Route::resource('withdraws', 'WithdrawController');
    Route::resource('charge-wallets', 'ChargeWalletController');
    Route::resource('support-tickets', 'SupportTicketController');

    Route::get('update-withdraw-status/{order}/{status}', 'WithdrawController@withdraw_status');
    Route::get('update-charge-wallets-status/{order}/{status}', 'ChargeWalletController@charge_wallet_status');
    Route::get('update-payment-status/{order}/{status}', 'PaymentController@payment_status');

    Route::post('accept-payment-order/{order}', 'PaymentController@accept_order_payment');
    Route::post('refuse-payment-order/{order}', 'PaymentController@refuse_order_payment');


    Route::get('wallet-payments/recievied', 'WalletController@payments_recievied');
    Route::get('wallet-payments/sent', 'WalletController@payments_sent');
    Route::get('ticket-support/payments/all', 'SupportTicketController@get_payments_all');

    Route::get('support-tickets/status/{ticket_id}/{status}', 'SupportTicketController@change_status_ticket');
});


Route::middleware(['admin'])->prefix('admin')->namespace('Admin')->name('admin')->group(function(){
    Route::resource('users','UserController');
    Route::resource('payments','PaymentController');
    Route::resource('withdraws','WithdrawController');
    Route::resource('charge-wallets', 'ChargeWalletController');
    Route::resource('tickets','TicketSupportController');
    Route::get('update-withdraw-status/{order}/{status}','WithdrawController@withdraw_status');
    Route::get('update-charge-wallet-status/{order}/{status}','ChargeWalletController@charge_wallet_status');
    Route::get('support-tickets/status/{ticket_id}/{status}','TicketSupportController@change_status_ticket');
});

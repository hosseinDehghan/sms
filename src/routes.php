<?php
Route::group(['middleware' => ['web']], function () {
    Route::get("sms", "Hosein\Sms\Controllers\SmsController@index");
    Route::post("sms/create", "Hosein\Sms\Controllers\SmsController@create");
    Route::post("sms/update/{id}", "Hosein\Sms\Controllers\SmsController@update");
    Route::post("sms/send", "Hosein\Sms\Controllers\SmsController@send");
    Route::get("sms/edit/{id}", "Hosein\Sms\Controllers\SmsController@edit");
    Route::get("sms/delete/{id}", "Hosein\Sms\Controllers\SmsController@delete");

});

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Swap\Laravel\Facades\Swap;

Route::redirect('/', '/dev', 302);

Route::any('/dev', function (Request $request) {
    $dollars = $request->get('money', null);

    if ($dollars !== null) {
        try {
            /** @var \Exchanger\ExchangeRate $rate */
            $rate = Swap::latest('USD/EUR');
            $euros = $dollars * $rate->getValue();
        } catch (\Exception $e) {
            $error = true;
        }
    }

    return view('welcome', [
        'dollars' => $dollars,
        'euros' => $euros ?? null,
        'error' => $error ?? false,
    ]);
});

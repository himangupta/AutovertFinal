<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    $Products=\App\Http\Controllers\FunctionLayer\productController::getProducts();
    return view("product")->with("viewData",['data'=>$Products] );
});

Route::get('/cart', function () {
    $Products=\App\Http\Controllers\FunctionLayer\cartController::getCartProducts();
    $sum=0;
    foreach($Products as $product){
        $sum+=$product->total_cost;
    }
    return view("cart")->with("viewData",['data'=>$Products,'total'=>$sum] );
});

Route::post('/cart/remove', function () {
    $response = \App\Http\Controllers\FunctionLayer\cartController::deleteFromCart($_POST['cart_id']);
    return $response;
});

Route::post('/cart/addToCart', function () {
    $detailsArray = array();
    $detailsArray['product_id']=$_POST['id'];
    $detailsArray['quantity']=$_POST['addQuantity'];
    $detailsArray['per_item_cost']=$_POST['cost'];
    $response = \App\Http\Controllers\FunctionLayer\cartController::addToCart($detailsArray);
    return $response;
});

<?php

use App\Http\Controllers\OrderController;
use App\Livewire\Cart;
use App\Livewire\Product;
use App\Livewire\StoreFront;
use Illuminate\Support\Facades\Route;
use App\Actions\Webshop\HandleCheckoutSessionCompleted;
use App\Http\Controllers\WebhookController;
use App\Livewire\CheckoutStatus;
use App\Mail\OrderConfirmation;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

Route::get('/', StoreFront::class)->name('home');

Route::get('/product/{productId}', Product::class)->name('product');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout-status', CheckoutStatus::class)->name('checkout-status');
Route::get('/preview', function() {
    $order = Order::first();
    return new OrderConfirmation($order);
});



Route::post('/webhook/stripe', [WebhookController::class, 'handleStripeWebhook']);

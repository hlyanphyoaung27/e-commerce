<?php

namespace App\Providers;

use App\Actions\Webshop\MigrateSessionCart;
use App\Factories\CartFactory;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Http\Client\Request;
// use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Fortify\Fortify;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;
use Symfony\Component\Translation\Formatter\IntlFormatter;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Cashier::calculateTaxes();

        Fortify::authenticateUsing(function (LoginRequest $request) {
            $user = User::where('email', $request->email)->first();
     
            if ($user &&
                Hash::check($request->password, $user->password)) {
                (new MigrateSessionCart)->migrate(CartFactory::make(), $user?->cart ?: $user->cart);
                return $user;
            }
        });

        Blade::stringable(function (Money $money) {
            $formattedMoney = number_format($money->getAmount() / 100, 2); // Assuming amount is in cents
            $currencySymbol = '$'; // You can change this to the appropriate currency symbol
            
            return $currencySymbol . $formattedMoney;
        });
    }
    
}
    
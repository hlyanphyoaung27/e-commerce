<?php
namespace App\Listeners;

use App\Actions\Webshop\HandleCheckoutSessionCompleted;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle the event.
     */
    public function handle(array $payload): void
{
    Log::info('Webhook received', ['payload' => $payload]);

    if ($payload["type"] === "checkout.session.completed") {
        // Log::info('Checkout session completed', ['session_id' => $payload['data']['object']['id']]);
        (new HandleCheckoutSessionCompleted())->handle($payload['data']['object']['id']);
    }
}

}



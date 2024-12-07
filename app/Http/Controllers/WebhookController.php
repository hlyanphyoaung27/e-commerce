<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listeners\StripeEventListener;

class WebhookController extends Controller
{
    public function handleStripeWebhook(Request $request)
    {
        $event = $request->all();

        // You can do any additional processing or validation here if needed

        // Then call your event listener
        $listener = new StripeEventListener();
        $listener->handle($event);

        return response()->json(['status' => 'success']);
    }
}

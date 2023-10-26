<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class StripeTokenController
{
    use RetrievesBillableModels;

    /**
     * Create a new Stripe "setup intent".
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $setupIntent = Cashier::stripe()->setupIntents->create();

        return response()->json([
            'clientSecret' => $setupIntent->client_secret
        ]);
    }
}

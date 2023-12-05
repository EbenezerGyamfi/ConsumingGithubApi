<?php

namespace App\Services;

use App\Http\Integrations\Paystack\Paystack;
use App\Http\Integrations\Paystack\Requests\InitiPayStackRequest;
use App\Interface\PaystackInterface;

final class PaystackService implements PaystackInterface {

    public function __construct(public readonly string $token)
    {
        
    }

    private function connector(){

        return app(Paystack::class)->withTokenAuth($this->token);
    }


    public function initiate(string $email, int $amount): array
    {
        return $this->connector()
        ->send(new InitiPayStackRequest($email, $amount))
        ->json();

    }
}
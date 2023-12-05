<?php

namespace App\Http\Integrations\Paystack;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class Paystack extends Connector
{
    use AcceptsJson;


    public function resolveBaseUrl(): string
    {
        return 'https://api.paystack.co/transaction';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

}

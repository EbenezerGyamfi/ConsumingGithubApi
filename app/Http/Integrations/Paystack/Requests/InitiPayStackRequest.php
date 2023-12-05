<?php

namespace App\Http\Integrations\Paystack\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class InitiPayStackRequest extends Request implements HasBody
{
    use HasJsonBody;


    protected Method $method = Method::POST;


    public function __construct(protected readonly string $email, protected readonly int $amount)
    {
        
    }


    protected function defaultBody(): array
    {
        return [
            'email' => $this->email,
            'amount' => $this->amount
        ];
    }


    public function resolveEndpoint(): string
    {
        return '/initialize';
    }
}

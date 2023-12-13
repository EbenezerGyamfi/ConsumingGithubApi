<?php

namespace App\Http\Integrations\Github\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteRepoRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::DELETE;


    public function __construct(
        private readonly string $repoName,
        private readonly string $owner
    )
    {
        
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->owner.'/'.$this->repoName;

    }
}

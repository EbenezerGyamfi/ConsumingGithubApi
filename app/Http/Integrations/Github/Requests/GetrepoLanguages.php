<?php

namespace App\Http\Integrations\Github\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetrepoLanguages extends Request
{
    /**
     * The HTTP method of the request
     */

     public function __construct
     (
        private readonly string $repoName, 
        private readonly string $owner
     )
     {
        
     }

    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->owner.'/'.$this->repoName.'/languages';
    }
}

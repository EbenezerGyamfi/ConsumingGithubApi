<?php

namespace App\Http\Integrations\Github\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GithubLanguageRequest extends Request
{

    public function __construct(private readonly string $userName,private readonly string $repoName)
    {
        
    }
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */


    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->userName.'/'.$this->repoName.'/languages';
    }
}

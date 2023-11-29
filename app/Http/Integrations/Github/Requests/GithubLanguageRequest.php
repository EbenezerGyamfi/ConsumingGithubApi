<?php

namespace App\Http\Integrations\Github\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GithubLanguageRequest extends Request
{

    public function __construct(public string $userName,public string $repoName)
    {
        
    }
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */


     public function fromResponse(Response $response){


        
        return $response->json();
     }

    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->userName.'/'.$this->repoName.'/languages';
    }
}

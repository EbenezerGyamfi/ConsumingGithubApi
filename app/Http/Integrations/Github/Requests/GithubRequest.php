<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\Repo;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GithubRequest extends Request
{

    public function __construct(private string $name, private string $repoName)
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
        return '/repos/'.$this->name.'/'.$this->repoName;

    }

    public function createDtoFromResponse(Response $response) : mixed{

        $reponseData = $response->json();

        return new Repo(name: $reponseData['name'], isPrivate: $reponseData['private'], description: $reponseData['description']);
    }
}

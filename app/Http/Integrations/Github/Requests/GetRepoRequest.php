<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\Repo;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetRepoRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;


    public function __construct(
        private readonly string $repoName,
        private readonly string $owner
    ){}


    public function createDtoFromResponse(Response $response): mixed{

        return Repo::fromResponse($response->json());
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->owner.'/'.$this->repoName;

    }
}

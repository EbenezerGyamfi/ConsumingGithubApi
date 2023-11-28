<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\Repo;
use Carbon\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class getRepoRequest extends Request
{
    /**
     * The HTTP method of the request
     */

    public function __construct(private readonly string $owner,  private readonly string $repo)
    {
    }

    protected Method $method = Method::GET;

    /**api
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/repos/'.$this->owner.'/'.$this->repo;
    }

    
    public function createDtoFromResponse(Response $response) : mixed
    {
        return Repo::fromResponse($response->json());
    }
}

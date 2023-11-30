<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class GithubCreateRepoRequest extends Request implements HasBody
{
    
    use HasJsonBody;

    public function __construct(public readonly NewRepoData $newRepoData){}

    public function defaultBody() : array{

        return [
            'name' => $this->newRepoData->name,
        ];
    }
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */


     public function createDtoFromResponse(Response $response) : Repo{

        $responseData = $response->json();

        return new Repo($responseData['name']);
    }

    public function resolveEndpoint(): string
    {
        return '/user/repos';
    }
}

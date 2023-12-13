<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateGithubRepo extends Request implements HasBody
{

    use HasJsonBody;

    public function __construct(private readonly NewRepoData $newRepoData){}
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */

     protected function defaultBody(): array
     {
        return [
            'name' => $this->newRepoData->repoName,
            'private' => $this->newRepoData->private,
            'description' => $this->newRepoData->description,
        ];
     }


    public function resolveEndpoint(): string
    {
        return '/user/repos';

    }


   public function createDtoFromResponse(Response $response): mixed
   {
    
     return Repo::fromResponse($response->json());
   }
}

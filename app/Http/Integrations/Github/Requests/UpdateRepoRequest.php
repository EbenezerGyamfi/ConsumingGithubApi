<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepoData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateRepoRequest extends Request implements HasBody
{

    use HasJsonBody;
    /**
     * The HTTP method of the request
     */

     public function __construct(
        private readonly string $repoName,
        private readonly string $owner,
        private readonly UpdateRepoData $updateRepoData
     )
     {
        
     }
    protected Method $method = Method::PATCH;


    protected function defaultBody(): array
    {
        return [
            'name' => $this->updateRepoData->repoName,
            'private' => $this->updateRepoData->private,
            'description' => $this->updateRepoData->description,
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
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

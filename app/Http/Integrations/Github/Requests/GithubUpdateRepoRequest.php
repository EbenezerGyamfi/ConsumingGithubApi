<?php

namespace App\Http\Integrations\Github\Requests;

use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepo;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class GithubUpdateRepoRequest extends Request implements HasBody
{
    use HasJsonBody;
    public function __construct(public readonly  UpdateRepo $updateRepo, public readonly string $owner, public readonly string $repoName)
    {
        
    }
    protected Method $method = Method::PATCH;


    public function defaultBody() : array{

        return [
            'name' => $this->updateRepo->name,
        ];

    }




    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {

        return '/repos/'.$this->owner.'/'.$this->repoName;
    }

   

    public function fromResponse(Response $response): mixed{

        return Repo::fromResponse($response->json());
    }
}

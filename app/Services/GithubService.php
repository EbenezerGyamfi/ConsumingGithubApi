<?php

namespace App\Services;

use App\DataTransferObjects\Repo;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\GithubLanguageRequest;
use App\Http\Integrations\Github\Requests\GithubRequest;
use App\Interface\GithubInterface;

final class GithubService implements GithubInterface
{

    public function __construct(private string $token)
    {
        
    }

    public function connector(){
        return app(GithubConnector::class)->withTokenAuth($this->token);
    }


    public function getRepo(string $name,  string $repoName) : Repo
    {
      return $this->connector()
      ->send(new GithubRequest($name,$repoName))
      ->dtoOrFail();
    }


    public function getLanguages(string $name, string $repoName): array{

      return $this->connector()
             ->send(new GithubLanguageRequest( userName:$name, repoName:$repoName))
             ->json();
         
    }
}

<?php

namespace App\Services;

use App\DataTransferObjects\Repo;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\GetAllUserRepoRequest;
use App\Http\Integrations\Github\Requests\GithubRequest;
use App\Interface\GithubInterface;

final class GithubService implements GithubInterface
{

  public function __construct(private string $token)
  {
  }

  public function connector()
  {
    return app(GithubConnector::class)->withTokenAuth($this->token);
  }


  public function getRepo(string $name,  string $repoName)
  {
    return $this->connector()
      ->send(new GithubRequest($name, $repoName))
      ->json();
  }

  public function getRepos(string $name)
  {
    $response =  $this->connector()
      ->paginate(new GetAllUserRepoRequest($name))
      ->collect();

      
    return $response;
  }
}

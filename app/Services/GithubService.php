<?php

namespace App\Services;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepo;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\GithubCreateRepoRequest;
use App\Http\Integrations\Github\Requests\GithubLanguageRequest;
use App\Http\Integrations\Github\Requests\GithubRequest;
use App\Http\Integrations\Github\Requests\GithubUpdateRepoRequest;
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

    $requests = [
      new GithubRequest('EbenezerGyamfi', 'Taste-Repo-11'),
      new GithubRequest('EbenezerGyamfi', 'Taste-Repo-10'),
      new GithubRequest('EbenezerGyamfi', 'Taste-Repo-9'),
      new GithubRequest('EbenezerGyamfi', 'ChangeRepoNameTest3'),
      new GithubRequest('EbenezerGyamfi', 'ConsumingGithubApi'),
      new GithubRequest('EbenezerGyamfi', 'ConsumingGithubApi'),
      new GithubRequest('EbenezerGyamfi', 'Taste-Repo-11'),
    ];

    foreach ($requests as $key => $request) {
      return $this->connector()
        ->send($request)
        ->json();
    }
  }


  public function getLanguages(string $name, string $repoName): array
  {

    return $this->connector()
      ->send(new GithubLanguageRequest(userName: $name, repoName: $repoName))
      ->json();
  }


  public function createRepo(NewRepoData $newRepoData): Repo
  {
    return $this->connector()
      ->send(new GithubCreateRepoRequest($newRepoData))
      ->dtoOrFail();
  }


  public function updateRepo(string $repoName, string $owner,  UpdateRepo $updateRepo): Repo
  {


    return $this->connector()
      ->send(new GithubUpdateRepoRequest(updateRepo: $updateRepo, owner: $owner, repoName: $repoName))
      ->dtoOrFail();
  }
}

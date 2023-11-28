<?php
namespace App\Service;

use App\DataTransferObjects\Repo;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\getRepoRequest;
use App\Interface\GithubInterface;

final class GithubService implements GithubInterface{

    public function __construct(
        private string $token
    )
    {}

    private function connector(){
        return app(GithubConnector::class)->withTokenAuth($this->token);
    }

public function getRepo(string $owner, string $repo) : Repo
    {

        return $this->connector()
        ->send(new getRepoRequest($owner, $repo))
        ->dtoOrFail();
 
    }


    // public function getRepos() : RepoCollection
    // {
        
    // }


    // public function createRepo(NewRepoData $newRepoData) : Repo
    // {
        
    // }

    // public function updateRepo(string $owner, string $name) : Repo
    // {
        
    // }


    // public function deleteRepo(string $owner, string $repoName) : void
    // {
        
    // }


    // public function getRepoLanguages() : array
    // {
        
    // }
}
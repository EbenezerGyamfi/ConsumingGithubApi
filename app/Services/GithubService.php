<?php
namespace App\Services;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepoData;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\GetrepoLanguages;
use App\Http\Integrations\Github\Requests\GetRepoRequest;
use App\Interfaces\GithubInterface;
use App\RepoCollection\Repocollection;

final class GithubService implements GithubInterface {

    public function __construct(private readonly string $token)
    {
        
    }


    public function connnector(): GithubConnector{

        return app(GithubConnector::class)->withTokenAuth($this->token);
    }



    public function getRepos(): Repocollection
    {
        
    }


    public function getRepo(string $repoName, string $owner): Repo
    {
        return $this->connnector()
        ->send(new GetRepoRequest(repoName: $repoName, owner: $owner))
        ->dtoOrFail();
    }

    public function updateRepo(string $repoName, string $owner, UpdateRepoData $updateRepoData): Repo
    {
        
    }

    public function createRepo(NewRepoData $newRepoData): Repo
    {
        
    }


    public function deleteRepo(string $repoName, string $owner): void
    {
        
    }


    public function getRepoLanguages(string $repoName, string $owner): array
    {
        
        return $this->connnector()
                    ->send(new GetrepoLanguages(repoName: $repoName, owner: $owner))
                    ->collect()
                    ->keys()
                    ->all();

    }



}
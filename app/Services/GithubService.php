<?php
namespace App\Services;

use App\Collection\Repocollection;
use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepoData;
use App\Http\Integrations\Github\GithubConnector;
use App\Http\Integrations\Github\Requests\CreateGithubRepo;
use App\Http\Integrations\Github\Requests\DeleteRepoRequest;
use App\Http\Integrations\GitHub\Requests\GetAuthUserRepos;
use App\Http\Integrations\Github\Requests\GetrepoLanguages;
use App\Http\Integrations\Github\Requests\GetRepoRequest;
use App\Http\Integrations\Github\Requests\UpdateRepoRequest;
use App\Interfaces\GithubInterface;

final class GithubService implements GithubInterface {

    public function __construct(private readonly string $token)
    {
        
    }


    public function connnector(): GithubConnector{

        return app(GithubConnector::class)->withTokenAuth($this->token);
    }



    public function getRepos(): Repocollection
    {
        $repos  =  $this->connnector()
                        ->paginate(new GetAuthUserRepos)
                        ->collect()
                        ->ensure(Repo::class);
            
            return Repocollection::make($repos);
    }


    public function getRepo(string $repoName, string $owner): Repo
    {
        return $this->connnector()
        ->send(new GetRepoRequest(repoName: $repoName, owner: $owner))
        ->dtoOrFail();
    }

    public function updateRepo(string $repoName, string $owner, UpdateRepoData $updateRepoData): Repo
    {

        return $this->connnector()
                    ->send(new UpdateRepoRequest(repoName: $repoName, owner: $owner, updateRepoData: $updateRepoData))
                    ->dtoOrFail();
    }

    public function createRepo(NewRepoData $newRepoData): Repo
    {
        return $this->connnector()
                    ->send(new CreateGithubRepo($newRepoData))
                    ->dtoOrFail();
                    
    }


    public function deleteRepo(string $repoName, string $owner): void
    {

        $this->connnector()
            ->send(new DeleteRepoRequest($repoName, $owner));
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
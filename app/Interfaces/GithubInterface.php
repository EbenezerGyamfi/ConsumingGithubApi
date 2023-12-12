<?php
namespace App\Interfaces;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepoData;
use App\RepoCollection\Repocollection;

interface GithubInterface {

    public function getRepos(): Repocollection;

    public function getRepo(string $repoName, string $owner): Repo;

    public function getRepoLanguages(string $repoName, string $owner) : array;

    public function createRepo(NewRepoData $newRepoData) : Repo;

    public function updateRepo(string $repoName, string $owner,  UpdateRepoData $updateRepoData) : Repo;

    public function deleteRepo(string $repoName, string $owner): void;

}
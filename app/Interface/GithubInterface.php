<?php

namespace App\Interface;

use App\DataTransferObjects\NewRepoData;
use App\DataTransferObjects\Repo;
use App\DataTransferObjects\UpdateRepo;

interface GithubInterface {

    public function getRepo(string $name, string $repo) : ?Repo;

    public function getLanguages(string $name, string $repoName): array;

    public function createRepo(NewRepoData $newRepoData) : Repo;

    public function updateRepo(string $reponName, string $owner, UpdateRepo $updateRepo) : Repo;

}
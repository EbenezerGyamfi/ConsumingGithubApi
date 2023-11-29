<?php

namespace App\Interface;

use App\DataTransferObjects\Repo;

interface GithubInterface {

    public function getRepo(string $name, string $repo);

    public function getLanguages(string $name, string $repoName): array;

}
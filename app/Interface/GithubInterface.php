<?php

namespace App\Interface;

use App\DataTransferObjects\Repo;

interface GithubInterface  {

    public function getRepo(string $owner, string $name) : Repo;
 


// public function getRepos() : RepoCollection;
    


    // public function createRepo(NewRepoData $newRepoData) : Repo;
   

    // public function updateRepo(string $owner, string $name) : Repo;
 


    // public function deleteRepo(string $owner, string $repoName) : void;
 


    // public function getRepoLanguages() : array;
   
}
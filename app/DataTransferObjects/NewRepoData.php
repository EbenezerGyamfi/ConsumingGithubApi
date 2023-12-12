<?php
namespace App\DataTransferObjects;
final class NewRepoData {

    public function __construct
    (
        public readonly string $repoName,
        public readonly bool $private,
        public readonly string $description
    )
    {
        
    }

}
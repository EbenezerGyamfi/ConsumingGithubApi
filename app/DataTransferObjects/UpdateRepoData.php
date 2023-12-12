<?php
namespace App\DataTransferObjects;

use Illuminate\Validation\Rules\In;

class UpdateRepoData {

    public function __construct(
        
        public readonly string $repoName,
        public readonly bool $private,
        public readonly string $description

    )
    {
        
    }
}
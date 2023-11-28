<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Saloon\Http\Response;

final class Repo {

    public function __construct(
        public int $id,
        public string $owner,
        public string $name,
        public string $fullname,
        public bool $private,
        public string $description,
        public CarbonInterface $created_at
    )
    {
        
    }


    public  static function fromResponse(array $response): static{

        return new static(
            id: $response['id'],
            owner: $response['owner']['login'],
            name: $response['name'],
            fullname: $response['full_name'],
            private: $response['private'],
            description: $response['description'] ?? '',
            created_at: Carbon::parse($response['created_at']),
        );
    }
}
<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTime;

final class Repo
{

    public function __construct(
        public readonly int $id,
        public  readonly  string $owner,
        public readonly  string $name,
        public readonly  string $fullName,
        public readonly  bool $private,
        public  readonly string $description,
        public  readonly DateTime $createdAt
    ) {
    }

    public static function fromResponse(array $response) : static{


        return new static(
                id: $response['id'],
                owner: $response['owner']['login'],
                name: $response['name'],
                fullName: $response['full_name'],
                private: $response['private'],
                description: $response['description'] ?? '',
               createdAt: Carbon::parse($response['created_at'])
   
        );
    }
}

<?php

namespace App\DataTransferObjects;

use Carbon\CarbonInterface;

final class Repo
{

    public function __construct(
        public readonly int $id,
        public  readonly  string $owner,
        public readonly  string $name,
        public readonly  string $fullName,
        public readonly  bool $private,
        public  readonly string $description,
        public  readonly CarbonInterface $createdAt
    ) {
    }
}

<?php
namespace App\DataTransferObjects;


final class CreateRepo {

    public function __construct(public readonly string $name)
    {
        
    }
}
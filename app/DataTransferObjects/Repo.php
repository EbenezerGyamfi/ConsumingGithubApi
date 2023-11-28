<?php
namespace App\DataTransferObjects;


final  class Repo {

    public function __construct(public readonly string $name, public bool $isPrivate, public string $description)
    {
        
    }

    public static function fromResponse($response){

        return new static(name: $response['name'], isPrivate: $response['private'], description: $response['description']);
        
    }
}
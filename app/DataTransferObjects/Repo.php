<?php
namespace App\DataTransferObjects;


final  class Repo {

    public function __construct(public readonly string $name)
    {
        
    }

    public static function fromResponse($response){

        return new static(name: $response['name']);
        
    }
}
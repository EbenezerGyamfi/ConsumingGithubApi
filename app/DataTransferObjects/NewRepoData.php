<?php


final class NewRepoData{

    public function __construct(

        public string $name,
        public bool $isPrivate,
        public string $description
    )
    {
        
    }
}
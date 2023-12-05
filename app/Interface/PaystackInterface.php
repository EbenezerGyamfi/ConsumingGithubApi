<?php
namespace App\Interface;


interface PaystackInterface {

    public function initiate( string $email, int $amount): array;

    public function verify(string $reference): array;
}



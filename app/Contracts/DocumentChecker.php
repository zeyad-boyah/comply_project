<?php 


declare(strict_types=1);


namespace App\Contracts;


interface DocumentChecker 
{
    public function read(array $document): void;
}
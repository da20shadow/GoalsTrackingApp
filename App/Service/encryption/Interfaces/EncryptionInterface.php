<?php

namespace App\Service\encryption\interfaces;

interface EncryptionInterface
{
    public function hash(string $password);
    public function verify(string $password, string $hash);
}
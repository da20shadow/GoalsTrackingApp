<?php

namespace Database\interfaces;

interface DatabaseInterface
{
    public function query(string $query) : StatementInterface;
    public function getErrorInfo() : array;
}
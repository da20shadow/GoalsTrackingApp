<?php

namespace Database\interfaces;

interface StatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;
}
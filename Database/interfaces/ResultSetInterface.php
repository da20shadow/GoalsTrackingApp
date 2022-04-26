<?php

namespace Database\interfaces;

use Generator;

interface ResultSetInterface
{
    public function fetch($className) : Generator;
}
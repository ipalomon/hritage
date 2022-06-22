<?php

namespace App\heritage\Entity;

interface Properties
{
    const M2 = 300;
    const UNIT_IMMOVABLE = 1000000;
    public function updateProperties() : array;
}
<?php

namespace App\Heritage\Infrastructure\Repository;

class HeritageRepository
{
    public function getMemberByName($name, $family): Member
    {
        $members = $family->getMembers();
        // TODO  get member of de family
        return 0;
    }
}
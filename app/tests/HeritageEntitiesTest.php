<?php

namespace App\tests;

use App\heritage\Entity\Member;
use PHPUnit\Framework\TestCase;

class HeritageEntitiesTest extends TestCase
{
    // Create members´family. The tree family
    /**
     * @return void
     */
    public function testCreateMembersOfFamilyTree(){
        $member = new Member("02-20-1990", 0, 0, 0);
        $member0 = new Member("02-20-1980", 5, 0, 0);
        $member1 = new Member("02-20-1970", 0, 2000, 2);
        $member2 = new Member("02-20-1977", 3, 100000, 0);
        $member3 = new Member("02-20-1956", 3, 100000, 1);

        $members3 = array($member1, $member2);
        $member3->setMembers($members3);

        $members1 = array($member0);
        $member1->setMembers($members1);

        $members = array($member);
        $member0->setMembers($members);

        var_dump($member3->getMembers());

    }

}
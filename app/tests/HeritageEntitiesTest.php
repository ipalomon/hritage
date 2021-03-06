<?php

namespace App\tests;

use _PHPStan_76800bfb5\Nette\Utils\DateTime;
use App\Heritage\Entity\Member;

use App\Heritage\Utils\Utils;
use PHPUnit\Framework\TestCase;

class HeritageEntitiesTest extends TestCase
{
    // Create members´family. The tree family and compare data born
    // Date bor parent greather than date children.
    /**
     * @return void
     */
    public function testCreateMembersOfFamilyTree(){
        $member = new Member(new DateTime("1990-02-20"), 0, 0, 0);
        $member0 = new Member( new DateTime("1980-02-20"), 5, 0, 0);
        $member1 = new Member(new DateTime("1970-02-20"), 0, 0, 2);
        $member2 = new Member(new DateTime("1977-02-20"), 0, 0, 0);
        $member3 = new Member(new DateTime("1922-06-22"), 0, 100000, 1);
        $member4 = new Member(new DateTime("1990-02-21"), 0, 0, 1);
        $member5 = new Member(new DateTime("1993-03-21"), 0, 0, 1);
        $member6 = new Member(new DateTime("1992-02-23"), 0, 0, 1);
        $member7 = new Member(new DateTime("1989-04-21"), 0, 0, 1);

        // I compare the dates of birth to see that the father is older than the son
        $parent = new DateTime("1922-02-20");
        $son1 = new DateTime("1970-02-20");
        $son2 = new DateTime("1977-02-20");

        $this->assertGreaterThan($parent, $son1);
        $this->assertGreaterThan($parent, $son2);

        // generate the children member 3 have 2 children
        $members3 = array($member1, $member2);
        $member3->setMembers($members3);

        // I compare the dates of birth to see that the father is older than the son
        $parent = new DateTime("1970-02-20");
        $son0 = new DateTime("1980-02-20");
        $son4 = new DateTime("1990-02-21");
        $son5 = new DateTime("1993-03-21");
        $this->assertGreaterThan($parent, $son0);
        $this->assertGreaterThan($parent, $son4);
        $this->assertGreaterThan($parent, $son5);

        // generate the children member 1 have 3 children
        $members1 = array($member0,$member4,$member5);
        $member1->setMembers($members1);

        // I compare the dates of birth to see that the father is older than the son
        $parent = new DateTime("1980-02-20");
        $son6 = new DateTime("1992-02-23");
        $son7 = new DateTime("1989-04-21");
        $this->assertGreaterThan($parent, $son6);
        $this->assertGreaterThan($parent, $son7);

        // generate the children member 0 have 2 children
        $members0 = array($member6, $member7);
        $member0->setMembers($members0);
    }
}
<?php

namespace App\tests;

use App\Heritage\Services\ApiService;
use App\Heritage\Utils\Utils;
use PHPUnit\Framework\TestCase;

class InheritanceDistributionTest  extends TestCase
{
    public function testSetHeritageFromMoneyService(){
        // get family Tree With the parent
        $membersTree = Utils::getFamilyStructureDummyData();

        $yearsOldParent = Utils::getYearsOld($membersTree->getDateBorn());
        $this->assertGreaterThanOrEqual("100", $yearsOldParent);

        // The parent has more than greader 100 years
        if($yearsOldParent >= '100'){
            $members = $membersTree->getMembers();
            $m = $membersTree->getMoney();
            $membersTree->setMoneyReset(0);
            $this->assertEquals(0,$membersTree->getMoney(), "Ok");
            if(count($members) > 0){
                if($m > 0){
                    $money = $m/count($members);
                    for($x = 0; $x < count($members); $x++){
                        if(count($members[$x]->getMembers()) > 0){
                            $g = count($members);
                            $newMoney = $money/$g;
                            $members[$x]->setMoney(ceil($newMoney));
                            $this->assertEquals(25000,ceil($newMoney), "Ok");
                            ApiService::assignToChild( $newMoney,  $members[$x]);
                        }
                        else{
                            $this->assertEquals(50000,ceil($money), "Ok");
                            $members[$x]->setMoney(ceil($money));
                        }
                    }
                }
            }
        }
    }
}
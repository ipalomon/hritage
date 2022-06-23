<?php

namespace App\Heritage\Application;

use _PHPStan_76800bfb5\Nette\Utils\DateTime;
use App\Heritage\Entity\Member;

class InheritanceDistributionController
{

    /**
     * @param Member $familyTree
     * @param DateTime $currentDate
     * @return void
     */
    public function InheritanceDistributionMoney( Member $familyTree, DateTime $currentDate){
        // TODO implement from InheritanceDistributionMoneyTest this method change status $family when the parent go dead
    }

    /**
     * @param Member $familyTree
     * @param DateTime $currentDate
     * @return void
     */
    public function InheritanceDistributionLan( Member $familyTree, DateTime $currentDate){
        // TODO implement from InheritanceDistributionLanTest
    }

    public function InheritanceDistributionImmovable( Member $familyTree, DateTime $currentDate){
        // TODO implement from InheritanceDistributionImmovableTest
    }
}
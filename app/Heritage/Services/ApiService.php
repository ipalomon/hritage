<?php

namespace App\Heritage\Services;

use App\Heritage\Entity\Member;
use App\Heritage\Infrastructure\Repository\HeritageRepository;
use App\Heritage\Utils\Utils;

class ApiService
{
    private HeritageRepository $repository;
    public function __construct(HeritageRepository $repository){
        $this->repository = $repository;
    }
    public static function assignToChild( $money, Member $members, int $parentCount = 1)
    {
        $numMembers = $members->getMembers();
        $countMembers = count($members->getMembers()) * $parentCount;
        for($j = 0; $j < count($numMembers); $j++){
            if(count($numMembers[$j]->getMembers())) {
                $g = count($numMembers[$j]->getMembers()) * $countMembers;
                $numMembers[$j]->setMoney(ceil($money/$g));
                ApiService::assignToChild($money, $numMembers[$j], $g);
            }else{
                $numMembers[$j]->setMoney(ceil($money/$countMembers));
            }
        }
    }

    public static function setHeritageFromMoneyService(Member $membersTree)
    {
        // chech parent withc the current date
        $yearsOldParent = Utils::getYearsOld($membersTree->getDateBorn());

        // The parent has more than greader 100 years
        if($yearsOldParent >= '100'){
            $members = $membersTree->getMembers();
            $m = $membersTree->getMoney();
            $membersTree->setMoneyReset(0);
            $members = $membersTree->getMembers();
            if(count($members) > 0){
                if($m > 0){
                    $money = $m/count($members);
                    for($x = 0; $x < count($members); $x++){
                        if(count($members[$x]->getMembers()) > 0){
                            $g = count($members);
                            $newMoney = $money/$g;
                            $members[$x]->setMoney(ceil($newMoney));
                            ApiService::assignToChild( $newMoney,  $members[$x]);
                        }
                        else{
                            $members[$x]->setMoney(ceil($money));
                        }
                    }
                }
            }
        }
    }
    public function getTotalMember(string $name, Member $family):int{
        return $this->repository->getMemberByName($name, $family);
    }
}
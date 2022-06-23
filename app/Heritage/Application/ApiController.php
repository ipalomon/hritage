<?php

namespace App\Heritage\Application;

use _PHPStan_76800bfb5\Nette\Utils\DateTime;
use App\Heritage\Entity\Member;
use App\Heritage\Services\ApiService;

class ApiController
{
    private ApiService $service;
    public function __construct(ApiService $service){
        $this->service = $service;
    }

    /**
     * The current date is in $this->service::setHeritageFromMoneyService($family);
     * @param string $name
     * @param Member $family
     * @return int
     */
    public function getHeritageByName( string $name, Member $family):int
    {
        $this->service::setHeritageFromMoneyService($family);
        return $this->service->getTotalMember($name, $family);
    }

}
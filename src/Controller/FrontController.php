<?php

namespace Cal\Controller;

use _PHPStan_76800bfb5\Nette\Utils\DateTime;
use App\Heritage\Application\ApiController;
use App\Heritage\Entity\Member;
use App\Heritage\Services\ApiService;
use App\Heritage\Utils\Utils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController
{
    public function __invoke(Request $request): Response
    {
        $membersTree = Utils::getFamilyStructureDummyData();

        $api = new ApiController();
        $totalMember = $api->getHeritageByName(  $membersTree->getNameUuid(),  $membersTree,  date(now));

            return new Response(null, Response::HTTP_CREATED);

    }

}
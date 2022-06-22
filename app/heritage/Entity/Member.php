<?php

namespace App\heritage\Entity;

use App\heritage\Entity\ValueObject\Uuid;
use phpDocumentor\Reflection\Types\Boolean;

class Member implements Properties
{
    private $nameUuid;
    private $dateBorn;
    private $land;
    private $money;
    private $immovable;
    private $hasSon;
    private $hasParent;
    private $members;

    /**
     * @param string $dateBorn
     * @param int $land
     * @param int $money
     * @param int $immovable
     */
    public function __construct(string $dateBorn, int $land, int $money, int $immovable)
    {
        $this->nameUuid = Uuid::generate();
        $this->dateBorn = $dateBorn;
        $this->land = $land;
        $this->money = $money;
        $this->immovable = $immovable;
    }

    /**
     * @return array
     */
    public function getMembers():array
    {
        return $this->members;
    }

    /**
     * @param array $members
     */
    public function setMembers(array $members): void
    {
        $this->members = $members;
    }

    /**
     * @return string
     */
    public function getNameUuid(): string
    {
        return $this->nameUuid;
    }

    /**
     * @return mixed
     */
    public function getDateBorn()
    {
        return $this->dateBorn;
    }

    /**
     * @param mixed $dateBorn
     */
    public function setDateBorn($dateBorn): void
    {
        $this->dateBorn = $dateBorn;
    }

    /**
     * @return mixed
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * @param mixed $land
     */
    public function setLand($land): void
    {
        $this->land = $land;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money): void
    {
        $this->money = $money;
    }

    /**
     * @return mixed
     */
    public function getImmovable()
    {
        return $this->immovable;
    }

    /**
     * @param mixed $immovable
     */
    public function setImmovable($immovable): void
    {
        $this->immovable = $immovable;
    }


    public function updateProperties(): array
    {
        $properties["land"] = $this->land * Properties::M2;
        $properties["money"] = $this->money;
        $properties["immovable"] = $this->immovable * Properties::UNIT_IMMOVABLE;

        return $properties;
    }
}
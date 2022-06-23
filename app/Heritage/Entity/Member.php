<?php

namespace App\Heritage\Entity;

use App\Heritage\Entity\ValueObject\MemberUuid;
use DateTime;
use phpDocumentor\Reflection\Types\Boolean;

class Member implements Properties
{
    private string $nameUuid;
    private DateTime $dateBorn;
    private int $land;
    private int $money;
    private int $immovable;
    private array $members;

    /**
     * @param DateTime $dateBorn
     * @param int $land
     * @param int $money
     * @param int $immovable
     */
    public function __construct(DateTime $dateBorn, int $land, int $money, int $immovable, array $members = array())
    {
        $this->nameUuid = MemberUuid::generate();
        $this->dateBorn = $dateBorn;
        $this->land = $land;
        $this->money = $money;
        $this->immovable = $immovable;
        $this->members = $members;
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
     * @return DateTime
     */
    public function getDateBorn(): DateTime
    {
        return $this->dateBorn;
    }

    /**
     * @param DateTime $dateBorn
     */
    public function setDateBorn(DateTime $dateBorn): void
    {
        $this->dateBorn = $dateBorn;
    }

    /**
     * @return int
     */
    public function getLand(): int
    {
        return $this->land;
    }

    /**
     * @param int $land
     */
    public function setLand(int $land): void
    {
        $this->land += $land;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @param int $money
     */
    public function setMoney(int $money): void
    {
        $this->money += $money;
    }

    /**
     * @param int $money
     */
    public function setMoneyReset(int $money): void
    {
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getImmovable(): int
    {
        return $this->immovable;
    }

    /**
     * @param int $immovable
     */
    public function setImmovable(int $immovable): void
    {
        $this->immovable += $immovable;
    }


    public function updateProperties(): array
    {
        $properties["land"] = $this->land * Properties::M2;
        $properties["money"] = $this->money;
        $properties["immovable"] = $this->immovable * Properties::UNIT_IMMOVABLE;

        return $properties;
    }
}
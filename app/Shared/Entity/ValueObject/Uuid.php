<?php

declare(strict_types=1);

namespace App\Shared\Entity\ValueObject;

use Ramsey\Uuid\Uuid as BaseUuid;

class Uuid
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public static function generate(): string
    {
        return BaseUuid::uuid4()->toString();
    }

    public function value(): string
    {
        return $this->id;
    }

    public function isValid(string $id): bool
    {
        return BaseUuid::isValid($id);
    }

    public function __toString(): string
    {
        return $this->value();
    }
}

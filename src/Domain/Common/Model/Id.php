<?php

/*
 * This file is part of the Donut package.
 *
 * (c) Victor Monserrat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Donut\Domain\Common\Model;

use Donut\Domain\Common\Exception\NotValidId;
use Ramsey\Uuid\Uuid;

final class Id extends ValueObject
{
    public static function fromUuidString(string $uuid): self
    {
        if (!Uuid::isValid($uuid)) {
            throw NotValidId::causeNotValidUuidString($uuid);
        }

        $id = new self();
        $id->value = $uuid;

        return $id;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}

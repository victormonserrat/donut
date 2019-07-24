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

namespace Donut\Domain\Common\Exception;

use DomainException;

final class NotValidId extends DomainException
{
    public static function causeNotValidUuidString(string $uuid): self
    {
        return new self("{$uuid} is not a valid uuid string.");
    }
}

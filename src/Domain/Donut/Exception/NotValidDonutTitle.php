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

namespace Donut\Domain\Donut\Exception;

use DomainException;

final class NotValidDonutTitle extends DomainException
{
    public static function causeBlankString(): self
    {
        return new self('Donut title can not be a blank string.');
    }
}

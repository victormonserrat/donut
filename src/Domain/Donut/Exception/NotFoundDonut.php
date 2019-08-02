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
use Donut\Domain\Common\Model\Id;

final class NotFoundDonut extends DomainException
{
    public static function withId(Id $id): self
    {
        return new self("Donut with {$id} id can not be found.");
    }
}

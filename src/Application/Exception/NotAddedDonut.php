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

namespace Donut\Application\Exception;

use DomainException;
use Donut\Domain\Common\Model\Id;

final class NotAddedDonut extends DomainException
{
    public static function withIdCauseAlreadyExists(Id $id): self
    {
        return new self("Donut with {$id} id can not be added cause already exists.");
    }
}

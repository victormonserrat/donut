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

interface ValueObject
{
    /** @return mixed */
    public function value();

    public function isEqualTo(self $valueObject): bool;
}

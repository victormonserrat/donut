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

namespace Donut\Tests\Spec\Fixtures;

use Ramsey\Uuid\Uuid;

final class Id
{
    public static function string(): string
    {
        return Uuid::uuid4()->toString();
    }
}

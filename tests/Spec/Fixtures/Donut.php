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

use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Model\DonutTitle;
use Faker\Factory;
use Ramsey\Uuid\Uuid;

final class Donut
{
    public static function id(): Id
    {
        return Id::fromUuidString((string) Uuid::uuid4());
    }

    public static function title(): DonutTitle
    {
        return DonutTitle::fromString(Factory::create()->sentence());
    }
}

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

namespace Donut\Domain\Donut\Model;

use Donut\Domain\Common\Model\ValueObject;
use Donut\Domain\Donut\Exception\NotValidDonutTitle;

final class DonutTitle extends ValueObject
{
    public static function fromString(string $title): self
    {
        $trimmedTitle = trim($title);

        if ($trimmedTitle === '') {
            throw NotValidDonutTitle::causeBlankString();
        }

        $donutTitle = new self();
        $donutTitle->value = $trimmedTitle;

        return $donutTitle;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}

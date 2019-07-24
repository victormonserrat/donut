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

abstract class AbstractValueObject implements ValueObject
{
    /** @var mixed */
    protected $value;

    final protected function __construct()
    {
    }

    /** @return mixed */
    final public function value()
    {
        return $this->value;
    }

    final public function isEqualTo(ValueObject $valueObject): bool
    {
        return get_class($valueObject) === self::class && $valueObject->value() === $this->value();
    }
}

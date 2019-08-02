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

class ValueObject
{
    /** @var mixed */
    protected $value;

    final public function isEqualTo(self $valueObject): bool
    {
        return get_class($valueObject) === get_class($this) && $valueObject->value() === $this->value();
    }

    /** @return mixed */
    final public function value()
    {
        return $this->value;
    }

    final protected function __construct()
    {
    }
}

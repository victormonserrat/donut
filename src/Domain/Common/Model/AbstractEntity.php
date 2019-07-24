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

abstract class AbstractEntity implements Entity
{
    /** @var Id */
    protected $id;

    final protected function __construct()
    {
    }

    final public function id(): Id
    {
        return $this->id;
    }

    final public function isTheSameAs(Entity $entity): bool
    {
        return get_class($entity) === self::class && $entity->id() === $this->id();
    }
}

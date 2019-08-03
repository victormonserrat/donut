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

class Entity
{
    /** @var Id */
    protected $id;

    final public function isTheSameAs(self $entity): bool
    {
        return get_class($entity) === get_class($this) && $entity->id()->isEqualTo($this->id());
    }

    final public function id(): Id
    {
        return $this->id;
    }

    final protected function __construct()
    {
    }
}

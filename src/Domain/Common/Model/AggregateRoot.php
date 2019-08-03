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

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot as ProophAggregateRoot;
use RuntimeException;

class AggregateRoot extends ProophAggregateRoot
{
    /** @var Id */
    protected $id;

    final public function isTheSameAs(self $aggregateRoot): bool
    {
        return get_class($aggregateRoot) === get_class($this) && $aggregateRoot->id()->isEqualTo($this->id());
    }

    final protected function aggregateId(): string
    {
        return $this->id()->value();
    }

    final protected function apply(AggregateChanged $event): void
    {
        $handler = 'apply' . implode(array_slice(explode('\\', get_class($event)), -1));

        if (!method_exists($this, $handler)) {
            throw new RuntimeException(sprintf(
                'Missing event handler method %s for aggregate root %s.',
                $handler,
                get_class($this)
            ));
        }

        $this->{$handler}($event);
    }

    final public function id(): Id
    {
        return $this->id;
    }

    final protected function __construct()
    {
        parent::__construct();
    }
}

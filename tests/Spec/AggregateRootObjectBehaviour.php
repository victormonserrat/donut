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

namespace Donut\Tests\Spec;

use PhpSpec\ObjectBehavior;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;

class AggregateRootObjectBehaviour extends ObjectBehavior
{
    /** @var AggregateTranslator */
    private $aggregateTranslator;

    protected function lastRecordedEvent(): AggregateChanged
    {
        $recordedEvents = $this->aggregateTranslator()->extractPendingStreamEvents($this->getWrappedObject());

        return end($recordedEvents);
    }

    private function aggregateTranslator(): AggregateTranslator
    {
        if (null === $this->aggregateTranslator) {
            $this->aggregateTranslator = new AggregateTranslator();
        }

        return $this->aggregateTranslator;
    }
}

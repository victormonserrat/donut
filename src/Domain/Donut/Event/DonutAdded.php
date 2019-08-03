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

namespace Donut\Domain\Donut\Event;

use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Model\DonutTitle;
use Prooph\EventSourcing\AggregateChanged;

final class DonutAdded extends AggregateChanged
{
    public static function with(Id $id, DonutTitle $title): self
    {
        return self::occur($id->value(), [
            'title' => $title->value(),
        ]);
    }

    public function id(): Id
    {
        return Id::fromUuidString($this->aggregateId());
    }

    public function title(): DonutTitle
    {
        return DonutTitle::fromString($this->payload()['title']);
    }
}

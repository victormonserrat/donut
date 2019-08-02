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

namespace spec\Donut\Domain\Donut\Model;

use Donut\Domain\Common\Model\AggregateRoot;
use Donut\Domain\Donut\Event\DonutAdded;
use Donut\Tests\Spec\AggregateRootObjectBehaviour;
use Donut\Tests\Spec\Fixtures\Donut;
use Exception;

final class DonutSpec extends AggregateRootObjectBehaviour
{
    public function it_is_an_aggregate(): void
    {
        $this->shouldHaveType(AggregateRoot::class);
    }

    public function it_can_be_added_with_id_and_title(): void
    {
        $id = Donut::id();
        $title = Donut::title();
        $this->beConstructedThrough('with', [
            $id,
            $title,
        ]);
        $lastEvent = $this->lastRecordedEvent();

        if (
            !$lastEvent instanceof DonutAdded ||
            !$lastEvent->id()->isEqualTo($id) ||
            !$lastEvent->title()->isEqualTo($title)
        ) {
            throw new Exception('DonutAdded event is not recorded.');
        }

        $this->id()->isEqualTo($id)->shouldBe(true);
        $this->title()->isEqualTo($title)->shouldBe(true);
    }
}

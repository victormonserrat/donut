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

use Donut\Domain\Common\Model\AggregateRoot;
use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Event\DonutAdded;

final class Donut extends AggregateRoot
{
    /** @var DonutTitle */
    private $title;

    public static function with(Id $id, DonutTitle $title): self
    {
        $donut = new self();
        $donut->recordThat(DonutAdded::with(
            $id,
            $title
        ));

        return $donut;
    }

    protected function applyDonutAdded(DonutAdded $event): void
    {
        $this->id = $event->id();
        $this->title = $event->title();
    }

    public function __toString(): string
    {
        return (string) $this->title();
    }

    public function title(): DonutTitle
    {
        return $this->title;
    }
}

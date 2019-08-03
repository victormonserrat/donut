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

namespace spec\Donut\Application\Handler;

use Donut\Application\Command\AddDonut;
use Donut\Application\Exception\NotAddedDonut;
use Donut\Domain\Donut\Exception\NotFoundDonut;
use Donut\Domain\Donut\Model\Donut;
use Donut\Domain\Donut\Repository\Donuts;
use Donut\Tests\Spec\Fixtures\Donut as DonutFixtures;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class AddDonutHandlerSpec extends ObjectBehavior
{
    public function let(Donuts $donuts): void
    {
        $this->beConstructedWith($donuts);
    }

    public function it_adds_a_donut(Donuts $donuts): void
    {
        $id = DonutFixtures::id();
        $title = DonutFixtures::title();
        $donuts->withId($id)->willThrow(NotFoundDonut::withId($id));
        $donuts->add(Argument::that(function (Donut $donut) use ($id, $title) {
            return
                $donut->id()->isEqualTo($id) &&
                $donut->title()->isEqualTo($title)
            ;
        }))->shouldBeCalled();

        $this(AddDonut::with(
            $id,
            $title
        ));
    }

    public function it_does_not_add_a_donut_with_an_existing_id(Donuts $donuts): void
    {
        $id = DonutFixtures::id();
        $title = DonutFixtures::title();
        $donuts->withId($id)->willReturn(Donut::with(
            $id,
            $title
        ));

        $this->shouldThrow(NotAddedDonut::withIdCauseAlreadyExists($id))->during('__invoke', [
            AddDonut::with(
                $id,
                $title
            ),
        ]);
    }
}

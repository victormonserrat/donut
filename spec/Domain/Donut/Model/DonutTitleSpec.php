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

use Donut\Domain\Common\Model\ValueObject;
use Donut\Domain\Donut\Exception\NotValidDonutTitle;
use Donut\Tests\Spec\Fixtures\Donut;
use PhpSpec\ObjectBehavior;

final class DonutTitleSpec extends ObjectBehavior
{
    public function it_is_a_value_object(): void
    {
        $this->shouldHaveType(ValueObject::class);
    }

    public function it_can_be_created_from_string(): void
    {
        $title = (string) Donut::title();
        $this->beConstructedThrough('fromString', [
            $title,
        ]);
        $this->value()->shouldReturn($title);
    }

    public function it_is_trimmed(): void
    {
        $this->beConstructedThrough('fromString', [
            '    Title    ',
        ]);
        $this->value()->shouldReturn('Title');
    }

    public function it_can_not_be_created_from_blank_string(): void
    {
        $this->beConstructedThrough('fromString', [
            '    ',
        ]);
        $this->shouldThrow(NotValidDonutTitle::causeBlankString())->duringInstantiation();
    }
}

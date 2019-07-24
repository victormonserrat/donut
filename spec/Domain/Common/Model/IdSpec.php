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

namespace spec\Donut\Domain\Common\Model;

use Donut\Domain\Common\Exception\NotValidId;
use Donut\Domain\Common\Model\ValueObject;
use Donut\Tests\Spec\Fixtures\Id;
use PhpSpec\ObjectBehavior;

final class IdSpec extends ObjectBehavior
{
    public function it_is_a_value_object(): void
    {
        $this->shouldImplement(ValueObject::class);
    }

    public function it_can_be_created_from_uuid_string(): void
    {
        $uuid = Id::string();
        $this->beConstructedThrough('fromUuidString', [
            $uuid,
        ]);
        $this->value()->shouldReturn($uuid);
    }

    public function it_can_not_be_created_from_not_valid_uuid_string(): void
    {
        $notValidUuid = 'invalid uuid';
        $this->beConstructedThrough('fromUuidString', [
            $notValidUuid,
        ]);
        $this->shouldThrow(NotValidId::causeNotValidUuidString($notValidUuid))->duringInstantiation();
    }
}

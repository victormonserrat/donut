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

namespace Donut\Tests\Behat\Repository;

use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Exception\NotFoundDonut;
use Donut\Domain\Donut\Model\Donut;
use Donut\Domain\Donut\Repository\Donuts;
use Ramsey\Uuid\Uuid;

final class InMemoryDonuts implements Donuts
{
    /** @var Donut[] */
    private $donuts;

    public function __construct()
    {
        $this->donuts = [];
    }

    public function nextIdentity(): Id
    {
        return Id::fromUuidString(Uuid::uuid4()->toString());
    }

    public function withId(Id $id): Donut
    {
        foreach ($this->donuts as $donut) {
            if ($donut->id()->isEqualTo($id)) {
                return $donut;
            }
        }

        throw NotFoundDonut::withId($id);
    }

    public function add(Donut $donut): void
    {
        $this->donuts[] = $donut;
    }

    public function removeAll(): void
    {
        $this->donuts = [];
    }
}

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

namespace Donut\Domain\Donut\Repository;

use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Exception\NotAddedDonut;
use Donut\Domain\Donut\Exception\NotFoundDonut;
use Donut\Domain\Donut\Model\Donut;

interface Donuts
{
    public function nextIdentity(): Id;

    /** @throws NotFoundDonut */
    public function withId(Id $id): Donut;

    /** @throws NotAddedDonut */
    public function add(Donut $donut): void;
}

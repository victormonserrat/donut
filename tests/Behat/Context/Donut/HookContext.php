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

namespace Donut\Tests\Behat\Context\Donut;

use Behat\Behat\Context\Context;
use Donut\Domain\Donut\Repository\Donuts;

final class HookContext implements Context
{
    /** @var Donuts */
    private $donuts;

    public function __construct(
        Donuts $donuts
    ) {
        $this->donuts = $donuts;
    }

    /**
     * @AfterScenario
     */
    public function afterScenario(): void
    {
        $this->donuts->removeAll();
    }
}

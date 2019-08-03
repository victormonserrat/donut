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
use Donut\Domain\Donut\Model\Donut;
use Donut\Domain\Donut\Model\DonutTitle;
use Donut\Domain\Donut\Repository\Donuts;
use Donut\Tests\Behat\Repository\SharedRepository;

final class SetupContext implements Context
{
    /** @var Donuts */
    private $donuts;

    /** @var SharedRepository */
    private $sharedRepository;

    public function __construct(
        Donuts $donuts,
        SharedRepository $sharedRepository
    ) {
        $this->donuts = $donuts;
        $this->sharedRepository = $sharedRepository;
    }

    /**
     * @Given /^the donut titled ("[^"]+") has been added$/
     */
    public function theDonutTitledHasBeenAdded(DonutTitle $title): void
    {
        $id = $this->donuts->nextIdentity();
        $donut = Donut::with(
            $id,
            $title
        );
        $this->donuts->add($donut);
        $this->sharedRepository->add('donut', $donut);
    }
}

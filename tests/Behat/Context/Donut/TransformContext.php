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
use Donut\Tests\Behat\Repository\SharedRepository;

final class TransformContext implements Context
{
    /** @var SharedRepository */
    private $sharedRepository;

    public function __construct(SharedRepository $sharedRepository)
    {
        $this->sharedRepository = $sharedRepository;
    }

    /** @Transform */
    public function findDonutFromSharedStorage(): Donut
    {
        return $this->sharedRepository->withKey('donut');
    }

    /** @Transform */
    public function getDonutTitleFromString(string $title): DonutTitle
    {
        return DonutTitle::fromString($title);
    }
}

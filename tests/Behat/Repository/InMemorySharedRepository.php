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

final class InMemorySharedRepository implements SharedRepository
{
    /** @var array */
    private $memory;

    public function withKey(string $key)
    {
        return $this->memory[$key];
    }

    public function add(string $key, $value): void
    {
        $this->memory[$key] = $value;
    }
}

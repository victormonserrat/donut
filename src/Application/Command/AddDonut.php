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

namespace Donut\Application\Command;

use Donut\Domain\Common\Model\Id;
use Donut\Domain\Donut\Model\DonutTitle;

final class AddDonut
{
    /** @var Id */
    private $id;

    /** @var DonutTitle */
    private $title;

    public static function with(Id $id, DonutTitle $title): self
    {
        $command = new self();
        $command->id = $id;
        $command->title = $title;

        return $command;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function title(): DonutTitle
    {
        return $this->title;
    }

    private function __construct()
    {
    }
}

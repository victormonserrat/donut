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

namespace Donut\Application\Handler;

use Donut\Application\Command\AddDonut;
use Donut\Application\Exception\NotAddedDonut;
use Donut\Domain\Donut\Exception\NotFoundDonut;
use Donut\Domain\Donut\Model\Donut;
use Donut\Domain\Donut\Repository\Donuts;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class AddDonutHandler implements MessageHandlerInterface
{
    /** @var Donuts */
    private $donuts;

    public function __construct(Donuts $donuts)
    {
        $this->donuts = $donuts;
    }

    public function __invoke(AddDonut $command): void
    {
        $id = $command->id();

        try {
            $this->donuts->withId($id);
        } catch (NotFoundDonut $exception) {
            $this->donuts->add(Donut::with(
                $id,
                $command->title()
            ));

            return;
        }

        throw NotAddedDonut::withIdCauseAlreadyExists($id);
    }
}

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
use Donut\Application\Command\AddDonut;
use Donut\Application\Exception\NotAddedDonut;
use Donut\Domain\Donut\Model\Donut;
use Donut\Domain\Donut\Model\DonutTitle;
use Donut\Domain\Donut\Repository\Donuts;
use Donut\Tests\Behat\Repository\SharedRepository;
use Exception;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

final class ApplicationContext implements Context
{
    /** @var MessageBusInterface */
    private $bus;

    /** @var Donuts */
    private $donuts;

    /** @var SharedRepository */
    private $sharedRepository;

    public function __construct(
        MessageBusInterface $bus,
        Donuts $donuts,
        SharedRepository $sharedRepository
    ) {
        $this->bus = $bus;
        $this->donuts = $donuts;
        $this->sharedRepository = $sharedRepository;
    }

    /** @When /^I add a donut titled ("[^"]+")$/ */
    public function iAddADonutTitled(DonutTitle $title): void
    {
        $id = $this->donuts->nextIdentity();
        $this->bus->dispatch(AddDonut::with(
            $id,
            $title
        ));
        $this->sharedRepository->add('donut', Donut::with(
            $id,
            $title
        ));
    }

    /** @Then /^(it) should be available in the list$/ */
    public function itShouldBeAvailableInTheList(Donut $donut): void
    {
        $this->donuts->withId($donut->id());
    }

    /** @Then /^I should not be able to add (it) again$/ */
    public function iShouldNotBeAbleToAddItAgain(Donut $donut): void
    {
        $id = $donut->id();

        try {
            $this->bus->dispatch(AddDonut::with(
                $id,
                $donut->title()
            ));

            throw new Exception('HandlerFailedException exception has not been thrown.');
        } catch (HandlerFailedException $exception) {
            $currentException = current($exception->getNestedExceptions());

            if ($currentException->getMessage() !== NotAddedDonut::withIdCauseAlreadyExists($id)->getMessage()) {
                throw new Exception($currentException->getMessage());
            }
        }
    }
}

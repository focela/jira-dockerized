<?php

/*
 * Copyright (c) 2022-2024 Focela Technologies, All rights reserved.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 */

namespace Focela\Support\Tests\Traits;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Focela\Support\Traits\EventTrait;

class EventTraitTest extends TestCase
{
    /** @test */
    public function it_can_set_and_retrieve_the_dispatcher()
    {
        $eventTrait = new EventTraitStub();

        $dispatcher = m::mock('Illuminate\Contracts\Events\Dispatcher');

        $eventTrait->setDispatcher($dispatcher);

        $this->assertSame($eventTrait->getDispatcher(), $dispatcher);
    }

    /** @test */
    public function it_can_set_and_retrieve_the_dispatcher_status()
    {
        $eventTrait = new EventTraitStub();

        $dispatcher = m::mock('Illuminate\Contracts\Events\Dispatcher');

        $method = method_exists($dispatcher, 'fire') ? 'fire' : 'dispatch';
        $dispatcher->shouldReceive($method)->once();

        $eventTrait->setDispatcher($dispatcher);

        $eventTrait->disableDispatcher();

        $this->assertFalse($eventTrait->getDispatcherStatus());

        $eventTrait->testEvent();

        $eventTrait->enableDispatcher();

        $this->assertTrue($eventTrait->getDispatcherStatus());

        $eventTrait->testEvent();
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        m::close();
    }
}

class EventTraitStub
{
    use EventTrait;

    public function testEvent()
    {
        $this->fireEvent('test');
    }
}

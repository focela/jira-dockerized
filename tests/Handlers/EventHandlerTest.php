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

namespace Focela\Support\Tests\Handlers;

use PHPUnit\Framework\TestCase;
use Illuminate\Container\Container;
use Focela\Support\Handlers\EventHandler;

class EventHandlerTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $eventHandler = new EventHandlerStub(new Container());

        $this->assertInstanceOf(EventHandler::class, $eventHandler);
    }

    /** @test */
    public function it_can_retrieve_dynamic_objects_from_the_container()
    {
        $container = new Container();
        $container->bind('foo', function () {
            return 'bar';
        });

        $handler = new EventHandlerStub($container);

        $this->assertSame('bar', $handler->foo);
    }
}

class EventHandlerStub extends EventHandler
{
}

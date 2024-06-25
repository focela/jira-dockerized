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
use Focela\Support\Traits\ValidatorTrait;

class ValidatorTraitTest extends TestCase
{
    /** @test */
    public function it_can_set_and_retrieve_the_validator_instance()
    {
        $validator = new ValidatorTraitStub();

        $mailer = m::mock('Focela\Support\Validator');

        $validator->setValidator($mailer);

        $this->assertSame($validator->getValidator(), $mailer);
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        m::close();
    }
}

class ValidatorTraitStub
{
    use ValidatorTrait;
}

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

namespace Focela\Support\Contracts;

use Illuminate\Contracts\Validation\Validator;

interface ValidatorInterface
{
    /**
     * Returns the validation rules.
     *
     * @return array
     */
    public function getRules(): array;

    /**
     * Sets the validation rules.
     *
     * @param array $rules
     *
     * @return $this
     */
    public function setRules(array $rules): ValidatorInterface;

    /**
     * Returns the validation messages.
     *
     * @return array
     */
    public function getMessages(): array;

    /**
     * Sets the validation messages.
     *
     * @param array $messages
     *
     * @return $this
     */
    public function setMessages(array $messages): ValidatorInterface;

    /**
     * Returns the validation custom attributes.
     *
     * @return array
     */
    public function getCustomAttributes(): array;

    /**
     * Sets the validation custom attributes.
     *
     * @param array $customAttributes
     *
     * @return $this
     */
    public function setCustomAttributes(array $customAttributes): ValidatorInterface;

    /**
     * Returns the validation bindings.
     *
     * @return array
     */
    public function getBindings(): array;

    /**
     * Create a scope scenario.
     *
     * @param string $scenario
     * @param array  $arguments
     *
     * @return \Focela\Support\Validator
     */
    public function on(string $scenario, array $arguments = []);

    /**
     * Create a scope scenario.
     *
     * @param string $scenario
     * @param array  $arguments
     *
     * @return $this
     */
    public function onScenario(string $scenario, array $arguments = []): ValidatorInterface;

    /**
     * Register bindings to the scenario.
     *
     * @param array $bindings
     *
     * @return Validator
     */
    public function bind(array $bindings);

    /**
     * Register the bindings.
     *
     * @param array $bindings
     *
     * @return $this
     */
    public function registerBindings(array $bindings): ValidatorInterface;

    /**
     * Execute validation service.
     *
     * @param array $data
     *
     * @return Validator
     */
    public function validate(array $data);

    /**
     * Sets if we should bypass the validation or not.
     *
     * @param bool $status
     *
     * @return $this
     */
    public function byPass(bool $status = true): ValidatorInterface;
}

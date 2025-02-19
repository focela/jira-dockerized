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

// Directories to not scan
use Focela\PhpCsFixer\Config;

$excludeDirs = [
    'vendor/',
];

// Files to not scan
$excludeFiles = [];

// Create a new Symfony Finder instance
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude($excludeDirs)
    ->ignoreDotFiles(true)->ignoreVCS(true)
    ->filter(function (SplFileInfo $file) use ($excludeFiles) {
        return !in_array($file->getRelativePathName(), $excludeFiles);
    });

return (new Config())
    ->setFinder($finder)
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->withPHPUnitRules();
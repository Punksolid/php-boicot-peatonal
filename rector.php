<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\CodeQuality\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/app',
//        __DIR__ . '/bootstrap',
//        __DIR__ . '/config',
        __DIR__ . '/lang',
//        __DIR__ . '/packages',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(ReturnTypeFromStrictScalarReturnExprRector::class);


    // define sets of rules
        $rectorConfig->sets([
            LevelSetList::UP_TO_PHP_81,
            LevelSetList::UP_TO_PHP_82,
//            SetList::CODE_QUALITY,
        ]);
};

<?php

declare(strict_types=1);

// Validates extension.yaml and package/ the way `yiipress get:theme` does, without installing anything.
// Usage: php .github/validate-manifest.php <engine checkout with vendor/> [package root]

use YiiPress\Extension\ExtensionType;
use YiiPress\Extension\Manifest\InvalidManifestException;
use YiiPress\Extension\Manifest\ManifestReader;

require $argv[1] . '/vendor/autoload.php';

try {
    $manifest = new ManifestReader()->read($argv[2] ?? dirname(__DIR__), ExtensionType::Theme);
} catch (InvalidManifestException $exception) {
    foreach ($exception->errors() as $error) {
        fwrite(STDERR, sprintf("::error file=extension.yaml::[%s] %s\n", $error->code, $error->message));
    }
    exit(1);
}

printf("%s %s is a valid %s for YiiPress %s.\n", $manifest->id, $manifest->version, $manifest->type->value, $manifest->yiipress);

<?php

namespace ArchLayerUser\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Class ArchUserServiceProvider
 *
 * @package ArchLayerUser\Provider
 */
class ArchUserServiceProvider extends ServiceProvider
{
    /**
     * The package root.
     *
     * @var string
     */
    protected $packageRoot;

    /**
     * {{@inheritdoc}}
     */
    public function boot(): void
    {
        $root = realpath(__DIR__ . '/../../');

        // Inform the application of our package migrations, this is a reusable package
        // therefore the registration of these migrations are not optional for this package.
        $this->loadMigrationsFrom("{$root}/database/migrations");
    }
}

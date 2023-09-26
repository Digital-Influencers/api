<?php

namespace Tests;

use Faker\Factory;
use Faker\Generator;

trait Utils
{
    public function makeFaker()
    {
        $app = app();

        $locale ??= $app->make('config')->get('app.faker_locale', Factory::DEFAULT_LOCALE);

        return $app->bound(Generator::class) ?
            $app->make(Generator::class,['locale' => $locale])  :
            Factory::create($locale ?? Factory::DEFAULT_LOCALE);
    }
}

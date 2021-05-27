<?php

namespace App\Console\Commands\Support;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Console\ControllerMakeCommand;

class APIControllerMake extends ControllerMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:api-controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API controller class';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\AppAPI\Controllers';
    }
}

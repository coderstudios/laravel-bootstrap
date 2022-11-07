<?php
/**
 * Part of the Laravel Bootstrap package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2022, Coder Studios Ltd
 *
 * @see       https://coderstudios.com
 */

namespace CoderStudios\LaravelBootstrap\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class DBBackupClear extends Command
{
    protected $filesystem;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csbootstrap:db_backup_clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear stale backup files';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $process = new Process('');
        $path = config('laravel-bootstrap.backup_dir');
        $command = sprintf(
            'find %s -maxdepth 1 -type f -ctime +30 -name \'*.gz\' -execdir rm -- \'{}\' \;',
            $path
        );
        $process->setCommandLine($command);
        $process->run();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borrado de toda la cache del sistema';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $this->call('config:cache', [
            '--cache',
        ]);
        $this->call('config:clear', [
            '--clear',
        ]);
        $this->call('cache:clear', [
            '--cache',
        ]);
        $this->call('view:clear', [
            '--view',
        ]);
        $this->call('route:cache', [
            '--route',
        ]);
    }
}
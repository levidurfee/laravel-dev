<?php

namespace App\Console\Commands;

use App\Jobs\HackThePlanet;
use Illuminate\Console\Command;

class EngageHack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hack:google';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hacks Google';

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
        HackThePlanet::dispatch("Google");
    }
}

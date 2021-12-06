<?php

namespace App\Console\Commands;
use App\Models\ImageModel;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tesstddddd';

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
     * @return int
     */
    public function handle()
    {
        // $img = new ImageModel();
        // $img -> name = "send test";
        // $img -> save();
        print("test\n");
        
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use xmlDb;

class CreateXmlDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //Create and connect to XML database (file)
        $db = xmlDb::connect('database');

        //Add products table
        $db->addTable('products');
    }
}

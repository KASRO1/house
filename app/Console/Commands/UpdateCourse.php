<?php

namespace App\Console\Commands;

use App\Classes\CourseFunction;
use App\Models\Coin;
use Illuminate\Console\Command;

class UpdateCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateCourse';

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
     * @return int
     */
    public function handle()
    {
        $coins = Coin::all();
        $courseFunction = new CourseFunction();

        foreach ($coins as $coin) {
            $coin->course = $courseFunction->getCoinPriceFromConsole($coin->id_coingap);
            $coin->save();
        }

        return 0;
    }
}

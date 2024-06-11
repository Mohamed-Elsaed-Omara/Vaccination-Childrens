<?php

namespace App\Console\Commands;

use App\Models\Dose;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckDoses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:doses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command check the date of doses for expiration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $doses = Dose::where('status',0)->get();
        
        $currantDate = Carbon::today();

        foreach($doses as $dose){

            if($dose->doses_date->lessThan($currantDate)){

                $dose->update(['status' => 1]);
            }
        }
    }
}

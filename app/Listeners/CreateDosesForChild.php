<?php

namespace App\Listeners;

use App\Events\CreateChild;
use App\Models\Dose;
use App\Models\Vaccination;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDosesForChild
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateChild $event): void
    {
        // كل دا علشان اجيب عمر الطفل بالشهور
        $child = $event->newChild;

        $birthdate = new DateTime($child->dateOfbirth);
        $currentDate = new DateTime();
        $diff = $currentDate->diff($birthdate);
        $ageInMonths = $diff->y * 12 + $diff->m;


        $vaccines = Vaccination::where('ageInmonths', '>=', $ageInMonths)->get();

        
        foreach ($vaccines as $vaccine) {
            $existingDose = Dose::where('child_id', $child->id)
                                ->where('vaccine_id', $vaccine->id)
                                ->first();
        
            // تحقق من عدم وجود تسجيل مماثل
            if (!$existingDose) {
                $months = $vaccine->ageInmonths; 
                $date = Carbon::parse($child->dateOfbirth);
                $newDate = '';
                $newDate = $months == 1 ?  $date : $date->addMonths($months);
                            
                $date = Carbon::createFromDate($newDate); 
                
                Dose::create([
                    'child_id' => $child->id,
                    'vaccine_id' => $vaccine->id,
                    'doses_date' => $date
                ]);
            }
        }
        
        
    }
}

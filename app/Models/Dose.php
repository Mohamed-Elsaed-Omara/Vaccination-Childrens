<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    protected $table = 'doses';

    protected $fillable = [
        'child_id',
        'vaccine_id',
        'doses_date'
    ];

    public function child(){
        
        return $this->belongsTo(Child::class);
    }

    public function vaccine(){

        return $this->belongsTo(Vaccination::class);
    }

   /*  protected function casts(): array
    {
        return [
            'doses_date' => 'date:Y-m-d',
        ];
    } */
}

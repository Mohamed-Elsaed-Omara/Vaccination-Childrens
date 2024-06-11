<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Vaccination extends Model
{
    use HasFactory;

    protected $table = 'vaccinations';

    protected $fillable = [
        'name',
        'description',
        'ageInmonths'
    ];


    protected $appends = ['age_text'];

    protected function ageText(): Attribute
    {
        return new Attribute(
            get: function(){

                if($this->ageInmonths == 1){
                    return 'عند الولادة';
                }elseif($this->ageInmonths == 2){
                    return 'شهرين';
                }elseif($this->ageInmonths > 2 && $this->ageInmonths <=10){
                    return $this->ageInmonths . 'شهور';
                }elseif($this->ageInmonths >= 11){
                    return $this->ageInmonths . 'شهر';
                }
            } 
        );
    
    }

    public function doses()
    {
        return $this->hasMany(Dose::class);
    }
}

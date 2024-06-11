<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'childrens';

    protected $fillable = [
        'name',
        'length',
        'weight',
        'dateOfbirth',
        'gender',
        'parent_id',
    ];

    public function parent(){
        
        return $this->belongsTo(Parrent::class , 'parent_id');
    }

    public function doses(){

        return $this->hasMany(Dose::class);
    }

}

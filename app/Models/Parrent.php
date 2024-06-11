<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Parrent extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'parents';

    protected $fillable = [
        'name',
        'national_id',
        'phone_number',
        'address',
        'password'
        
    ];
    //relationship
    public function childrens()
    {
        return $this->hasMany(Child::class,'parent_id');
    }

    //event
    protected static function booted(): void
    {
        static::created(function (Parrent $parent) {
            $parent->password = Hash::make($parent->national_id);
            $parent->save();
        });
    }
}

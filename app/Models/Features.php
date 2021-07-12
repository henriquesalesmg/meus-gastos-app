<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'type'];


    public function plan(){
        // return $this->hasMany(Plan::class);
        return $this->belongsTo(Plan::class);
    }
}
